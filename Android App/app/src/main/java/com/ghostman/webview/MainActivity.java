package com.ghostman.webview;

import android.Manifest;
import android.app.Activity;
import android.app.ProgressDialog;
import android.content.ContentValues;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.os.Environment;
import android.os.Handler;
import android.os.Parcelable;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.webkit.ConsoleMessage;
import android.webkit.GeolocationPermissions;
import android.webkit.PermissionRequest;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebResourceError;
import android.webkit.WebResourceRequest;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ArrayAdapter;
import android.widget.ProgressBar;
import android.widget.Toast;

import java.io.Console;
import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class MainActivity extends AppCompatActivity {

    static final int MY_PERMISSION_REQUEST_LOCATION = 21;
    static final int MY_PERMISSION_REQUEST_STORAGE = 22;
    static final int MY_PERMISSION_REQUEST_CAMERA = 23;
    String mGeoLocationRequestOrigin;
    String mGeoLocationCallback;
    String mStorageCallback;
    String mCameraCallback;

    private WebView webView;
    private ValueCallback<Uri[]> mUploadMessage;
    private static final int FILE_CHOOSER_RESULTCODE = 1;
    private String mCameraPhotoPath;
    ProgressDialog progressBar;

    final Activity activity = this;
    private Uri mCapturedImageURI = null;

    private SwipeRefreshLayout swipeRefreshLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        swipeRefreshLayout = findViewById(R.id.swipeLayout);
        webView = findViewById(R.id.myWebView);


        mStorageCallback = null;
        if (ContextCompat.checkSelfPermission(MainActivity.this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            if (ActivityCompat.shouldShowRequestPermissionRationale(MainActivity.this, Manifest.permission.WRITE_EXTERNAL_STORAGE)) {
                new AlertDialog.Builder(MainActivity.this)
                        .setMessage("This App requires Storage permission to work correctly")
                        .setNeutralButton(android.R.string.ok, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                ActivityCompat.requestPermissions(MainActivity.this,
                                        new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE},
                                        MY_PERMISSION_REQUEST_STORAGE);
                            }
                        })
                        .show();
            } else {
                ActivityCompat.requestPermissions(MainActivity.this,
                        new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE},
                        MY_PERMISSION_REQUEST_STORAGE);
            }

        }


        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webView.getSettings().setLoadWithOverviewMode(true);
        webView.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);

        webView.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
        webView.setScrollbarFadingEnabled(false);
        //webView.getSettings().setBuiltInZoomControls(true);
        webView.getSettings().setPluginState(WebSettings.PluginState.ON);
        webView.getSettings().setAllowFileAccess(true);
        //webView.getSettings().setSupportZoom(true);

        progressBar = ProgressDialog.show(this, "Please Wait", "Loading...");

        ConnectivityManager connectivityManager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        if (connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_MOBILE).getState() == NetworkInfo.State.CONNECTED ||
                connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI).getState() == NetworkInfo.State.CONNECTED) {

            webView.loadUrl("https://swachhnoida.000webhostapp.com/Home.php");


            //+++++++++++++++++++++++ WEB VIEW CLIENT +++++++++++++++++++++++++++
            webView.setWebViewClient(new WebViewClient() {

                //If you will not use this method url links are open in new brower not in webview
                @Override
                public boolean shouldOverrideUrlLoading(WebView view, String url) {
                    // Check if Url contains ExternalLinks string in url
                    // then open url in new browser
                    // else all webview links will open in webview browser
                    if (url.contains("google")) {
                        // Could be cleverer and use a regex
                        //Open links in new browser
                        view.getContext().startActivity(
                                new Intent(Intent.ACTION_VIEW, Uri.parse(url)));

                        // Here we can open new activity
                        return true;

                    } else {
                        // Stay within this webview and load url
                        view.loadUrl(url);
                        return true;
                    }
                }

                @Override
                public void onReceivedError(WebView view, WebResourceRequest request, WebResourceError error) {
                    //webView.loadUrl("file:///android_asset/error.html");
                    //webView.loadUrl("about:blank");
                    //Toast.makeText(getApplicationContext(),"Error Loading Page...",Toast.LENGTH_LONG).show();
                    super.onReceivedError(view, request, error);
                }

                @Override
                public void onPageFinished(WebView view, String url) {
                    Log.i("TAG", "Finished loading URL: " + url);
                    if (progressBar.isShowing()) {
                        progressBar.dismiss();
                    }
                    super.onPageFinished(view, url);
                }
            });


            //++++++++++++++++++++ WEB CHROME CLIENT ++++++++++++++++++++++++++++++++
            webView.setWebChromeClient(new WebChromeClient() {

                @Override
                public boolean onShowFileChooser(WebView webView, ValueCallback<Uri[]> filePath,
                                                 FileChooserParams fileChooserParams) {

                    mUploadMessage = filePath;

                    /* Tell the WebView has been permission is granted.
                    if (mUploadMessage != null) {
                        mUploadMessage.onReceiveValue(null);
                    }*/

                    // mUploadMessage = filePath;
                    Intent takePictureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);

                    if (takePictureIntent.resolveActivity(getApplicationContext().getPackageManager()) != null) {
                        // Create the File where the photo should go
                        File photoFile = null;
                        try {
                            File imageStorageDir = new File(
                                    Environment.getExternalStoragePublicDirectory(
                                            Environment.DIRECTORY_PICTURES)
                                    , "Hackathon");

                            if (!imageStorageDir.exists()) {
                                // Create AndroidExampleFolder at sdcard
                                imageStorageDir.mkdirs();
                            }

                            File file = new File(
                                    imageStorageDir + File.separator + "IMG_"
                                            + String.valueOf(System.currentTimeMillis())
                                            + ".jpg");
                            photoFile = file;
                            takePictureIntent.putExtra("PhotoPath", mCameraPhotoPath);
                        } catch (Exception ex) {
                            // Error occurred while creating the File
                            Log.e("TAG", "Unable to create Image File", ex);
                        }

                        // Continue only if the File was successfully created
                        if (photoFile != null) {
                            mCameraPhotoPath = "file:" + photoFile.getAbsolutePath();
                            takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT,
                                    Uri.fromFile(photoFile));
                        } else {
                            takePictureIntent = null;
                        }
                    }

                    Intent contentSelectionIntent = new Intent(Intent.ACTION_GET_CONTENT);
                    contentSelectionIntent.addCategory(Intent.CATEGORY_OPENABLE);
                    contentSelectionIntent.setType("image/*");

                    Intent[] intentArray;

                    if (takePictureIntent != null) {
                        intentArray = new Intent[]{takePictureIntent};
                    } else {
                        intentArray = new Intent[0];
                    }

                    Intent chooserIntent = new Intent(Intent.ACTION_CHOOSER);
                    chooserIntent.putExtra(Intent.EXTRA_INTENT, contentSelectionIntent);
                    chooserIntent.putExtra(Intent.EXTRA_TITLE, "Image Chooser");
                    chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, intentArray);
                    startActivityForResult(chooserIntent, FILE_CHOOSER_RESULTCODE);

                    return true;
                }


                @Override
                public void onGeolocationPermissionsShowPrompt(final String origin, final GeolocationPermissions.Callback callback) {
                    mGeoLocationRequestOrigin = null;
                    mGeoLocationCallback = null;

                    // Do we need to ask for permission?
                    if (ContextCompat.checkSelfPermission(MainActivity.this,
                            Manifest.permission.ACCESS_FINE_LOCATION)
                            != PackageManager.PERMISSION_GRANTED) {

                        // Should we show an explanation?
                        if (ActivityCompat.shouldShowRequestPermissionRationale(MainActivity.this, Manifest.permission.ACCESS_FINE_LOCATION)) {
                            new AlertDialog.Builder(MainActivity.this)
                                    .setMessage("This App requires GPS permission to work correctly")
                                    .setNeutralButton(android.R.string.ok, new DialogInterface.OnClickListener() {
                                        @Override
                                        public void onClick(DialogInterface dialog, int which) {
                                            //            mGeoLocationRequestOrigin = origin;
                                            //              mGeoLocationCallback = callback;
                                            ActivityCompat.requestPermissions(MainActivity.this,
                                                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                                                    MY_PERMISSION_REQUEST_LOCATION);
                                        }
                                    })
                                    .show();
                        } else {
                            //mGeoLocationRequestOrigin = origin;
                            //mGeoLocationCallback = callback;
                            ActivityCompat.requestPermissions(MainActivity.this,
                                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                                    MY_PERMISSION_REQUEST_LOCATION);
                        }

                    } else {
                        // Tell the WebView has been permission is granted.
                        callback.invoke(origin, true, true);
                    }

                    super.onGeolocationPermissionsShowPrompt(origin, callback);
                }
            });


        } else {
            AlertDialog.Builder builder;
            builder = new AlertDialog.Builder(this, android.R.style.Theme_Material_Dialog_Alert);
            builder.setCancelable(false);
            builder.setTitle(" ALERT ")
                    .setMessage("App Cannot work in Offline Mode.")
                    .setPositiveButton(R.string.exit, new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int which) {
                            System.exit(0);
                        }
                    })
                    /*.setNegativeButton(android.R.string.no, new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int which) {
                            // do nothing
                        }
                    })*/
                    .setIcon(android.R.drawable.ic_dialog_alert)
                    .show();

        }

        swipeRefreshLayout.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                refreshContent();
            }
        });
    }


    // Return here when file selected from camera or from sd card
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent intent) {
        if (requestCode == FILE_CHOOSER_RESULTCODE) {
            if (null == this.mUploadMessage) {
                Toast.makeText(MainActivity.this, "NULL", Toast.LENGTH_SHORT).show();
                return;
            }

            Uri[] result = null;
            try {
                if (resultCode != RESULT_OK) {
                    result = null;
                } else {

                    // Check that the response is a good one

                    if (resultCode == Activity.RESULT_OK) {
                        if (intent == null) {
                            // If there is not data, then we may have taken a photo
                            if (mCameraPhotoPath != null) {
                                result = new Uri[]{Uri.parse(mCameraPhotoPath)};
                            }
                            // Toast.makeText(activity, mCameraPhotoPath, Toast.LENGTH_SHORT).show();
                            mUploadMessage.onReceiveValue(result);
                        } else {
                            String dataString = intent.getDataString();
                            if (dataString != null) {
                                result = new Uri[]{Uri.parse(dataString)};
                                // Toast.makeText(activity, "ELSE", Toast.LENGTH_SHORT).show();
                                mUploadMessage.onReceiveValue(result);
                            }
                        }
                    }
                    //mUploadMessage.onReceiveValue(result);
                    //mUploadMessage = null;
                    return;
                }
            } catch (Exception e) {
                Toast.makeText(getApplicationContext(), "activity :" + e,
                        Toast.LENGTH_LONG).show();
            }

           // mUploadMessage.onReceiveValue(result);
           // mUploadMessage = null;

        }
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        switch (requestCode) {
            case MY_PERMISSION_REQUEST_LOCATION: {
                // If request is cancelled, the result arrays are empty.
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    // permission was granted, yay!
                    // Toast.makeText(activity, "PERMISSION GRANTED", Toast.LENGTH_SHORT).show();
                  /*  if (mGeolocationCallback == null)
                        mGeoLocationCallback.invoke(mGeoLocationRequestOrigin, true, true);
*/
                } else {
                    // permission denied, boo! Disable the functionality that depends on this permission.
                  //  if (mGeoLocationCallback != null) {
                        Toast.makeText(activity, "PERMISSION DENIED", Toast.LENGTH_SHORT).show();
                        //   mGeoLocationCallback.invoke(mGeoLocationRequestOrigin, false, false);
                        this.finish();
                        System.exit(0);
                    //}
                }
                break;
            }

            case MY_PERMISSION_REQUEST_STORAGE: {
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    // permission was granted, yay!
                    // Toast.makeText(activity, "PERMISSION GRANTED", Toast.LENGTH_SHORT).show();


                    mCameraCallback = null;
                    if (ContextCompat.checkSelfPermission(MainActivity.this,
                            Manifest.permission.CAMERA)
                            != PackageManager.PERMISSION_GRANTED) {

                        if (ActivityCompat.shouldShowRequestPermissionRationale(MainActivity.this, Manifest.permission.CAMERA)) {
                            new AlertDialog.Builder(MainActivity.this)
                                    .setMessage("This App requires Camera permission.")
                                    .setNeutralButton(android.R.string.ok, new DialogInterface.OnClickListener() {
                                        @Override
                                        public void onClick(DialogInterface dialog, int which) {
                                            ActivityCompat.requestPermissions(MainActivity.this,
                                                    new String[]{Manifest.permission.CAMERA},
                                                    MY_PERMISSION_REQUEST_CAMERA);
                                        }
                                    })
                                    .show();
                        } else {
                            ActivityCompat.requestPermissions(MainActivity.this,
                                    new String[]{Manifest.permission.CAMERA},
                                    MY_PERMISSION_REQUEST_CAMERA);
                        }

                    }

                } else {

                  //  if (mStorageCallback != null) {
                        Toast.makeText(activity, "PERMISSION DENIED", Toast.LENGTH_SHORT).show();
                        this.finish();
                        System.exit(0);
             //       }
                }
                break;
            }

            case MY_PERMISSION_REQUEST_CAMERA: {
                if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    // permission was granted, yay!
                    // Toast.makeText(activity, "PERMISSION GRANTED", Toast.LENGTH_SHORT).show();
                } else {
                    this.finish();
                    System.exit(0);
                    if (mStorageCallback != null) {
                        Toast.makeText(activity, "PERMISSION DENIED", Toast.LENGTH_SHORT).show();
                    }
                }
                break;
            }
        }
            // other 'case' lines to check for other permission this app might request
        }

    @Override
    public void onBackPressed() {
        if (webView.canGoBack())
            webView.goBack();
        else
            super.onBackPressed();
    }

    // fake a network operation's delayed response
    // this is just for demonstration, not real code!
    private void refreshContent() {
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                webView.reload();
                swipeRefreshLayout.setRefreshing(false);

            }
        }, 1000);

    }
}