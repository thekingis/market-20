<?php

    $home = $_SERVER['DOCUMENT_ROOT'];
    include_once $home.'/inc/connect.php';
    include_once $home.'/inc/classes.php';
    include_once $home.'/inc/functions.php';
    
    $userInfo = new UserInfo($con, $userId);
?>
<form onsubmit="saveProfile(this, event)">
  <input type="hidden" name="action" value="updateProfile">
  <div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="number" class="form-control" name="phone" value="<?php echo $userInfo->phone ;?>" required />
  </div>
  <div class="mb-3">
    <select class="form-select" aria-label="Default select example" name="country" required>
        <option value="">--Select Country--</option>
        <?php
            $countries = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "The Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Costa Rica", "Côte d’Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor-Leste)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "The Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia, Federated States of", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Sudan, South", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
            foreach($countries as $country) {
                $isCountry = $userInfo->country == $country;
                $selected = $isCountry ? 'selected' : '';
                echo '<option value="'.$country.'" '.$selected.'>'.$country.'</option>';
            }
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="occupation" class="form-label">Occupation</label>
    <input type="text" class="form-control" name="occupation" value="<?php echo $userInfo->occupation ;?>" required />
  </div>
  <div class="mb-3">
    <label class="form-label">Date of Birth</label>
    <div class="border border-2 rounded p-1 row mb-3">
        <div class="col">
            <nav class="fs-6">Year</nav>
            <select name="year" class="form-select" id="yearSelector" required>
                <option value="">----</option>
                <?php
                    $days30 = array('Apr', 'Jun', 'Sep', 'Nov');
                    $months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                    list($y, $m, $d) = explode('-', $userInfo->dateOfBirth);
                    $y = (int) $y;
                    $m = (int) $m;
                    $d = (int) $d;
                    $curYr = (int) date('Y');
                    for($i = $curYr; $i >= 1900; $i--){
                        $isYear = $y == $i;
                        $selected = $isYear ? 'selected' : '';
                        echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col">
            <nav class="fs-6">Month</nav>
            <select name="month" class="form-select" id="monthSelector" required>
                <option value="">----</option>
                <?php
                    foreach($months as $index=>$month){
                        $x = $index + 1;
                        $isMonth = $x == $m;
                        $selected = $isMonth ? 'selected' : '';
                        echo '<option value="'.$x.'" '.$selected.'>'.$month.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col">
            <nav class="fs-6">Day</nav>
            <select name="day" class="form-select" id="daySelector" required>
                <option value="">----</option>
                <?php
                    $mon = $months[$m-1];
                    $days = in_array($mon, $days30) ? 30 : ($m !== 2 ? 31 : ($y % 4 == 0 ? 29 : 28));
                    for($x = 1; $x <= $days; $x++){
                        $isDay = $x == $d;
                        $selected = $isDay ? 'selected' : '';
                        echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" value="" autocomplete="false" required />
  </div>
  <div class="my-2 bg-danger text-white mw-100 p-2 d-none" id="errorDiv"></div>
  <button type="submit" class="btn btn-primary bg-primary">Save</button>
</form>
<script>

    var days30 = ['Apr', 'Jun', 'Sep', 'Nov'];
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    $('select#yearSelector').on('change', function(){
        if($(this).find(":selected").val() != ''){
            var year = $(this).find(":selected").val();
            $('select#monthSelector, select#daySelector').html('<option value="" selected>----</option>');
            for(var i = 0; i < months.length; i++){
                var x = i + 1;
                var month = months[i];
                var days = i !== 1 ? $.inArray(month, days30) !== -1 ? 30 : 31 : year % 4 == 0 ? 29 : 28;
                var $option = $('<option>');
                $option.val(x);
                $option.html(month);
                $option.attr('data-days', days);
                $('select#monthSelector').append($option);
            }
        }
    });

    $('select#monthSelector').on('change', function(){
        if($(this).find(":selected").val() != ''){
            var days = parseInt($(this).find(":selected").attr('data-days'));
            $('select#daySelector').html('<option value="" selected>----</option>');
            for(var day = 1; day <= days; day++){
                var $option = $('<option>');
                $option.val(day);
                $option.html(day);
                $('select#daySelector').append($option);
            }
        }
    });

</script>