<?php

    class UserInfo {
        
        public $userId;
        public $cropName;
        public $fullName;
        public $firstName;
        public $lastName;
        public $email;
        public $phone;
        public $password;
        public $photoUrl;
        public $coverPhotoUrl;
        public $country;
        public $occupation;
        public $dateOfBirth;
        public $referalID;
        public $referenceID;
        public $capital;
        public $profit;
        public $referalBonus;
        public $verified;

        function __construct($con, $userId){
            $this->userId = $userId;
            
            $query = mysqli_query($con, "SELECT * FROM `accounts` WHERE id = ".$userId);
            $sql = mysqli_fetch_array($query);
            $this->firstName = $sql['fName'];
            $this->lastName = $sql['lName'];
            $this->email = $sql['email'];
            $this->phone = $sql['phone'];
            $this->password = $sql['password'];
            $this->photoUrl = $sql['photoUrl'];
            $this->coverPhotoUrl = $sql['coverPhotoUrl'];
            $this->country = $sql['country'];
            $this->occupation = $sql['occupation'];
            $this->dateOfBirth = $sql['dateOfBirth'];
            $this->referalID = $sql['referalID'];
            $this->referenceID = $sql['referenceID'];
            $this->capital = doubleval($sql['capital']);
            $this->profit = doubleval($sql['profit']);
            $this->referalBonus = doubleval($sql['referalBonus']);
            $this->verified = $sql['status'] == 'verified';
            list($this->cropName) = explode(' ', $this->firstName);
            $this->fullName = $this->firstName.' '.$this->lastName;
        }

        function friendlyDate(){
            $time = strtotime($this->dateOfBirth);
            return date('d F Y', $time);
        }

    }

    class StockInfo {

        public $stockId;
        public $stockName;
        public $percentage;
        public $numOfDays;

        function __construct($con, $stockId){
            $this->stockId = $stockId;
            
            $query = mysqli_query($con, "SELECT * FROM `stocks` WHERE id = ".$stockId);
            $sql = mysqli_fetch_array($query);
            $this->stockName = $sql['name'];
            $this->percentage = doubleval($sql['percentage']);
            $this->numOfDays = (int) $sql['numOfDays'];
        }

    }

    class InvestmentInfo {

        public $investmentId;
        public $userID;
        public $stockID;
        public $paymentID;
        public $amount;
        public $profit;
        public $dueTime;
        public $status;
        public $reInvested;
        public $date;

        function __construct($con, $investmentId){
            $this->investmentId = $investmentId;
            
            $query = mysqli_query($con, "SELECT * FROM `investments` WHERE id = ".$investmentId);
            $sql = mysqli_fetch_array($query);
            $this->userID = $sql['userID'];
            $this->stockID = $sql['stockID'];
            $this->paymentID = $sql['paymentID'];
            $this->amount = number_format(doubleval($sql['amount']), 2, '.', ',');
            $this->profit = number_format(doubleval($sql['profit']), 2, '.', ',');
            $this->dueTime = (int) $sql['dueTime'];
            $this->status = $sql['status'];
            $this->reInvested = filter_var($sql['reInvested'], FILTER_VALIDATE_BOOL);
            $this->date = $sql['date'];
        }

    }

    class WithdrawalInfo {

        public $withdrawalId;
        public $userID;
        public $investmentID;
        public $withdrawalMethod;
        public $walletAddress;
        public $includeCapital;
        public $purpose;
        public $status;
        public $date;

        function __construct($con, $withdrawalId){
            $this->withdrawalId = $withdrawalId;
            
            $query = mysqli_query($con, "SELECT * FROM `withdrawal-requests` WHERE id = ".$withdrawalId);
            $sql = mysqli_fetch_array($query);
            $this->userID = $sql['userID'];
            $this->investmentID = $sql['investmentID'];
            $this->withdrawalMethod = $sql['withdrawalMethod'];
            $this->walletAddress = $sql['walletAddress'];
            $this->includeCapital = filter_var($sql['includeCapital'], FILTER_VALIDATE_BOOL);
            $this->purpose = $sql['purpose'];
            $this->status = $sql['status'];
            $this->date = $sql['date'];
        }

    }

    class PaymentInfo {

        public $paymentId;
        public $userId;
        public $stockId;
        public $paymentMethod;
        public $referenceID;
        public $amount;
        public $status;
        public $date;
        public $time;

        function __construct($con, $paymentId){
            $this->paymentId = $paymentId;
            
            $query = mysqli_query($con, "SELECT * FROM `payments` WHERE id = ".$paymentId);
            $sql = mysqli_fetch_array($query);
            $this->userId = $sql['userID'];
            $this->stockId = $sql['stockID'];
            $this->paymentMethod = $sql['paymentMethod'];
            $this->referenceID = $sql['referenceID'];
            $this->status = $sql['status'];
            $this->date = $sql['date'];
            $this->date = $sql['date'];
            $this->time = strtotime($this->date);
            $this->amount = doubleval($sql['amount']);
        }

    }

    class AdminInfo {

        public $adminId;
        public $firstName;
        public $lastName;
        public $fullName;
        public $username;
        public $password;
        public $roles;
        public $deactivated;
        public $loggedOut;
        public $isSuperAdmin;

        function __construct($con, $adminId){
            $query = mysqli_query($con, "SELECT * FROM `admin` WHERE `id` = '".$adminId."'");
            $sql = mysqli_fetch_array($query);
            $this->adminId = $sql['id'];
            $this->firstName = $sql['firstName'];
            $this->lastName = $sql['lastName'];
            $this->username = $sql['username'];
            $this->password = $sql['password'];
            $this->roles = $sql['roles'];
            $this->deactivated = filter_var($sql['deactivated'], FILTER_VALIDATE_BOOLEAN);
            $this->loggedOut = filter_var($sql['loggedOut'], FILTER_VALIDATE_BOOLEAN);
            $this->isSuperAdmin = is_numeric($this->roles) && (int) $this->roles == 0;
            $this->fullName = $this->firstName.' '.$this->lastName;
        }

        public static function withUsername($con, $username){
            $query = mysqli_query($con, "SELECT * FROM `admin` WHERE `username` = '".$username."'");
            $sql = mysqli_fetch_array($query);
            $id = $sql['id'];
            return new self($con, $id);
        }

    }

    class RolesInfo {

        public $roleId;
        public $role;
        public $urlPath;
        public $path;
        public $deactivated;

        function __construct($query){
            if(mysqli_num_rows($query) == 1){
                $sql = mysqli_fetch_array($query);
                $this->roleId = $sql['id'];
                $this->role = $sql['role'];
                $this->urlPath = $sql['urlPath'];
                $this->deactivated = filter_var($sql['deactivated'], FILTER_VALIDATE_BOOLEAN);
                $this->path = str_replace('/', '', $this->urlPath);
            }
        }

        public static function withRoleName($con, $roleName){
            $query = mysqli_query($con, "SELECT * FROM `admin-roles` WHERE `role` = '".$roleName."'");
            return new self($query);
        }

        public static function withRoleURLPath($con, $roleURLPath){
            $query = mysqli_query($con, "SELECT * FROM `admin-roles` WHERE `urlPath` = '".$roleURLPath."'");
            return new self($query);
        }

        public static function withRolePath($con, $rolePath){
            $query = mysqli_query($con, "SELECT * FROM `admin-roles` WHERE `urlPath` = '/".$rolePath."/'");
            return new self($query);
        }

    }
?>