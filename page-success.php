<?php
/***
 *Template name: Успешно
 */ 
get_header(); ?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php the_title();?></h1>
                <table>
                    <!-- <tr>
                        <td>Response</td>
                        <td><?php echo $_POST['Response'];?></td>
                    </tr> -->
                    <tr>
                        <td>Номер документа, число, месяц и год его выписки</td>
                        <td><?php echo $_POST['oid'];echo  '  '; date_default_timezone_set('Asia/Bishkek'); echo date('d-m-y h:i:s');?></td>
                    </tr>
                    <tr>
                        <td>Наименование (код) торговой точки или эквайера</td>
                        <td><?php echo $_POST['merchantName'];?></td>
                    </tr>
                    <tr>
                        <td>Сумма платежа</td>
                        <td><?php echo $_POST['amount'];?></td>
                    </tr>
                    <tr>
                        <td>Валюта платежа</td>
                        <td><?php echo $_POST['currency'];?></td>
                    </tr>
                    <tr>
                        <td>Код авторизации</td>
                        <td><?php echo $_POST['AuthCode'];?></td>
                    </tr>
                    <!-- <tr>
                        <td>Размер комиссии или скидки (если есть)</td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td>Реквизиты Платежной карты</td>
                        <td><?php echo $_POST['MaskedPan'];?></td>
                    </tr>
                    <!-- <tr>
                        <td>Реквизиты поставщика услуг (служба поддержки клиентов)</td>
                        <td><?php echo $_POST['EXTRA.CARDISSUER'];?></td>
                    </tr -->
                </table>
                
                <form action="<?php echo get_stylesheet_directory_uri(); ?>/pdf.php" method="post">
                    <input type="hidden" name="oid" value="<?php echo $_POST['oid'];echo  '  '; date_default_timezone_set('Asia/Bishkek'); echo date('d-m-y h:i:s');?>">
                    <input type="hidden" name="merchantName" value="<?php echo $_POST['merchantName'];?>">
                    <input type="hidden" name="amount" value="<?php echo $_POST['amount'];?>">
                    <input type="hidden" name="currency" value="<?php echo $_POST['currency'];?>">
                    <input type="hidden" name="AuthCode" value="<?php echo $_POST['AuthCode'];?>">
                    <input type="hidden" name="MaskedPan" value="<?php echo $_POST['MaskedPan'];?>">
                    <button class="more">Скачать PDF</button>
                </form>
                
                <form action="<?php echo get_stylesheet_directory_uri(); ?>/mailer/send.php" method="post">
                    <input type="hidden" name="oid" value="<?php echo $_POST['oid'];echo  '  '; date_default_timezone_set('Asia/Bishkek'); echo date('d-m-y h:i:s');?>">
                    <input type="hidden" name="merchantName" value="<?php echo $_POST['merchantName'];?>">
                    <input type="hidden" name="amount" value="<?php echo $_POST['amount'];?>">
                    <input type="hidden" name="currency" value="<?php echo $_POST['currency'];?>">
                    <input type="hidden" name="AuthCode" value="<?php echo $_POST['AuthCode'];?>">
                    <input type="hidden" name="MaskedPan" value="<?php echo $_POST['MaskedPan'];?>">
                    <input type="hidden" name="Email" value="<?php echo $_POST['Email'];?>">
                    <button class="more">Отправить на Email</button>
                </form>
                
                
                
                <style>
                    table{
                        width: 100%;
                    }
                    table td{
                        padding: 10px;
                        border-bottom: 1px solid #eee;
                    }
                    form{
                        display: inline-block;
                        margin-top: 30px;
                    }
                    form .more{
                        background-color: #fc982f;
                        color: #333;
                        padding: 5px 20px;
                    }
                </style>

            </div>
        </div>
    </div>
</div>


<?php get_footer();?>