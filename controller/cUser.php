<?php
    include_once("../../model/mUser.php");
    
    class cUser extends mUser {
        public function cGetAllUser () {
            if ($this->mGetAllUser() != 0)
                return $this->mGetAllUser();
            return 0;
        }
    }
?>