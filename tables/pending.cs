using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Eco
{
    #region Pending
    public class Pending
    {
        #region Member Variables
        protected int _cid;
        protected int _uid;
        protected string _com_desc;
        protected unknown _com_loc_long;
        protected unknown _com_loc_lati;
        protected string _com_img;
        protected string _status;
        #endregion
        #region Constructors
        public Pending() { }
        public Pending(int cid, int uid, string com_desc, unknown com_loc_long, unknown com_loc_lati, string com_img, string status)
        {
            this._cid=cid;
            this._uid=uid;
            this._com_desc=com_desc;
            this._com_loc_long=com_loc_long;
            this._com_loc_lati=com_loc_lati;
            this._com_img=com_img;
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
        public virtual string Com_img
        {
            get {return _com_img;}
            set {_com_img=value;}
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