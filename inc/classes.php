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
        public $imagePath;
        public $percentage;
        public $numOfDays;

        function __construct($con, $stockId){
            $this->stockId = $stockId;
            
            $query = mysqli_query($con, "SELECT * FROM `stocks` WHERE id = ".$stockId);
            $sql = mysqli_fetch_array($query);
            $this->stockName = $sql['name'];
            $this->imagePath = $sql['imagePath'];
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
            $this->date = $sql['date'];
        }

    }

    
    class RemoteAddress {
        
        protected $useProxy = false;
        protected $trustedProxies = array();
        protected $proxyHeader = 'HTTP_X_FORWARDED_FOR';

        public function getIpAddress(){
            $ip = $this->getIpAddressFromProxy();
            if ($ip) {
                return $ip;
            }
    
            if (isset($_SERVER['REMOTE_ADDR'])) {
                return $_SERVER['REMOTE_ADDR'];
            }

            return '';
        }

        protected function getIpAddressFromProxy(){
            if (!$this->useProxy
                || (isset($_SERVER['REMOTE_ADDR']) && !in_array($_SERVER['REMOTE_ADDR'], $this->trustedProxies))
            ) {
                return false;
            }
    
            $header = $this->proxyHeader;
            if (!isset($_SERVER[$header]) || empty($_SERVER[$header])) {
                return false;
            }
    
            $ips = explode(',', $_SERVER[$header]);
            $ips = array_map('trim', $ips);
            $ips = array_diff($ips, $this->trustedProxies);
    
            if (empty($ips)) {
                return false;
            }
    
            $ip = array_pop($ips);
            return $ip;
        }
    
    }

?>