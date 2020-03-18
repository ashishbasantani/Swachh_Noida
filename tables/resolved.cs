using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Eco
{
    #region Resolved
    public class Resolved
    {
        #region Member Variables
        protected int _cid;
        protected int _uid;
        protected string _com_desc;
        protected unknown _com_loc_long;
        protected unknown _com_loc_lati;
        protected unknown _com_res_loc_long;
        protected unknown _com_res_loc_lati;
        protected string _com_img;
        protected string _com_close_img;
        protected string _status;
        #endregion
        #region Constructors
        public Resolved() { }
        public Resolved(int cid, int uid, string com_desc, unknown com_loc_long, unknown com_loc_lati, unknown com_res_loc_long, unknown com_res_loc_lati, string com_img, string com_close_img, string status)
        {
            this._cid=cid;
            this._uid=uid;
            this._com_desc=com_desc;
            this._com_loc_long=com_loc_long;
            this._com_loc_lati=com_loc_lati;
            this._com_res_loc_long=com_res_loc_long;
            this._com_res_loc_lati=com_res_loc_lati;
            this._com_img=com_img;
            this._com_close_img=com_close_img;
            this._status=status;
        }
        #endregion
        #region Public Properties
        public virtual int Cid
        {
            get {return _cid;}
            set {_cid=value;}
        }
        public virtual int Uid
        {
            get {return _uid;}
            set {_uid=value;}
        }
        public virtual string Com_desc
        {
            get {return _com_desc;}
            set {_com_desc=value;}
        }
        public virtual unknown Com_loc_long
        {
            get {return _com_loc_long;}
            set {_com_loc_long=value;}
        }
        public virtual unknown Com_loc_lati
        {
            get {return _com_loc_lati;}
            set {_com_loc_lati=value;}
        }
        public virtual unknown Com_res_loc_long
        {
            get {return _com_res_loc_long;}
            set {_com_res_loc_long=value;}
        }
        public virtual unknown Com_res_loc_lati
        {
            get {return _com_res_loc_lati;}
            set {_com_res_loc_lati=value;}
        }
        public virtual string Com_img
        {
            get {return _com_img;}
            set {_com_img=value;}
        }
        public virtual string Com_close_img
        {
            get {return _com_close_img;}
            set {_com_close_img=value;}
        }
        public virtual string Status
        {
            get {return _status;}
            set {_status=value;}
        }
        #endregion
    }
    #endregion
}