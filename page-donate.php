<?php
/***
 *Template name: Donate
 */
get_header(); ?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Помочь проекту</h1>
                <form method="post" action="https://entegrasyon.asseco-see.com.tr/fim/est3Dgate" id="form">
                <!-- <form method="post" action="https://kyrgyzmedia.kg/test.php" id="form"> -->
                                       <div class="form-group">
                        <input type="text" placeholder="Ваше имя" name="BillToName" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ваш email</label>
                        <input type="email" placeholder="example@mail.com" name="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ваш номер телефона</label>
                        <input type="text" id="phone" name="tel" placeholder="+___ ___ __ __ __"/>
                    </div>
                    <div class="form-group">
                        <label for="">Сумма пожертвования</label>
                        <!-- <select name="amount" id="amount" onchange="showOther();"> -->
                        <select name="amount" id="amount">
                            <option value="100">100 сом</option>
                            <option value="200">200 сом</option>
                            <option value="500">500 сом</option>
                            <option value="1000">1000 сом</option>
                            <option value="5000">5000 сом</option>
                            <option value="10000">10000 сом</option>
                            <!-- <option value="other">Другая сумма</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="checkbox" id="checkbox" onchange="document.querySelector('#button').disabled = false;" required/> 
                        <label>Я согласен с </label> <a href="https://kyrgyzmedia.kg/dogovor-oferty/"
                                    target="_blank">договором оферты</a>
                    </div>
                    <input type="hidden" id="clientid" name="clientid" value="170000005"/>
                    <input type="hidden" name="storetype" value="3d_Pay_Hosting" />
                    <input type="hidden" id="storekey" name="storekey" value="TEST1234" />
                    <input type="hidden" name="hash" value="" id="hash"/>
                    <span id="clearTextToBeHashed" class="hidden"></span>
                    <input type="hidden" id="islemtipi" name="islemtipi" value="Auth" />
                    <input type="hidden" name="currency" value="417" />
                    <input type="hidden" id="oid" name="oid" value="DEMIR-TEST-ORDER-<?php echo rand(1, 99999);?>" />
                    <input type="hidden" id="okUrl" name="okUrl" value="https://kyrgyzmedia.kg/success/"/>
                    <input type="hidden" id="failUrl" name="failUrl" value="https://kyrgyzmedia.kg/failure/" />
                    <input type="hidden" name="lang" value="ru" />
                    <?php 
                    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
                    <input type="hidden" id="rnd" name="rnd" value="<?php echo generateRandomString();?>" />
                    <input type="hidden" name="encoding" value="utf-8" />
                    <input type="hidden" id="instalment" name="instalment" value=""/> 
                    <input type="hidden" name="refreshtime" id="refreshtime" value="0">
                    <button class="more" id="button" onclick="submitForm()">Оплатить</button>
                </form>
                
                <div class="logos formlogos">
                    <div class="logos-item">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fpart1.png" alt="">
	                </div>
	                <div class="logos-item">
	                    <img style="max-width: 60%; position: relative; top: -8px;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/fpart2.png" alt="">
	                </div>
	                <div class="logos-item">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fpart3.png" alt="">
	                </div>
	                <div class="logos-item">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fpart4.png" alt="">
	                </div>
	                <div class="logos-item">
	                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fpart5.png" alt="">
	                </div>
                </div>
                
                <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"
            integrity="sha512-nOQuvD9nKirvxDdvQ9OMqe2dgapbPB7vYAMrzJihw5m+aNcf0dX53m6YxM4LgA9u8e9eg9QX+/+mPu8kCNpV2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    document.getElementById('phone').addEventListener('input', function (e) {
                      let x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
                      e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '');
                    });
                    
                    /*document.getElementById('customamount').addEventListener('input', function (e) {
                      let y = e.target.value.replace(/\D/g, '').match(/(\d{0,5})/);
                      e.target.value = !y[2] ? y[1] : y[1];
                    });
                    
                    function showOther() {
                        if (select.value == "other") {
                            document.getElementById("customamount").style.display = "block";
                        } else {
                            document.getElementById("customamount").style.display = "none";
                        }
                    }*/
                    
                    document.querySelector('#button').disabled = true;
                    
                    function calculateHash() {
            let clientid = document.getElementById("clientid").value;
            let oid = document.getElementById("oid").value;
            let amount = document.getElementById("amount").value;
            let okUrl = document.getElementById("okUrl").value;
            let failUrl = document.getElementById("failUrl").value;
            let islemtipi = document.getElementById("islemtipi").value;
            let rnd = document.getElementById("rnd").value;
            let instalment = document.getElementById("instalment").value;
            let storekey = document.getElementById("storekey").value;

            let clearText = clientid + oid + amount + okUrl + failUrl + islemtipi + instalment + rnd + storekey;
            let sha1Text = CryptoJS.SHA1(clearText);
            document.getElementById("hash").value = CryptoJS.enc.Base64.stringify(sha1Text);
            document.getElementById("clearTextToBeHashed").innerHTML = clearText;

        }

        function submitForm() {
            calculateHash();
            document.getElementById("form").submit();
		}
		function makeid(length) {
			var result           = '';
			var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			var charactersLength = characters.length;
			for ( var i = 0; i < length; i++ ) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
				}
				return result;
		}

                </script>
                <style>
                    form input{
                        height: 40px;
                    }
                    form .checkbox{
                        width: auto;
                        height: auto;
                        display: inline-block;
                    }
                    form .more{
                        background-color: #fc982f;
                        color: #333;
                        padding: 5px 30px;
                    }
                    form button:disabled, form button[disabled]{
                        background-color: #ffc78c;
                    }
                    form #customamount {
                        display: none;
                    }
                    .formlogos{
                        background-color: transparent;
                        margin-top: 30px;
                    }
                    .formlogos .logos-item img{
                        max-width: 100%;
                    }
                    .hidden{
                        display: none;
                    }
                </style>
                
                
            </div>
        </div>
    </div>
</div>


<?php get_footer();?>