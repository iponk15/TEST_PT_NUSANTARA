<?php
    $url = 'http://localhost:8000/api/customer/' . $_POST['id'];
    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);

    $result = curl_exec($ch);
    $decRes = json_decode($result);
    $cstmr  = $decRes->result;
?>

<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="customer_name" value="<?php echo $cstmr->customer_name; ?>" disabled>
    </div>
</div>
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-5">
        <input type="email" class="form-control" name="customer_email" value="<?php echo $cstmr->customer_email; ?>" disabled>
    </div>
</div>
<fieldset class="form-group">
    <div class="row">
    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customer_gender" value="L" class="custom-control-input" <?php echo ($cstmr->customer_gender == 'L' ? 'checked' : '') ?> disabled>
            <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customer_gender" value="P" class="custom-control-input" <?php echo ($cstmr->customer_gender == 'P' ? 'checked' : '') ?> disabled>
            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="form-group">
    <div class="row">
    <legend class="col-form-label col-sm-2 pt-0">Merried</legend>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="radioMerried1" name="customer_menikah" value="1" class="custom-control-input" <?php echo ($cstmr->customer_menikah == '1' ? 'checked' : '') ?> disabled>
            <label class="custom-control-label" for="radioMerried1">Iya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="radioMerried2" name="customer_menikah" value="0" class="custom-control-input" <?php echo ($cstmr->customer_menikah == '0' ? 'checked' : '') ?> disabled>
            <label class="custom-control-label" for="radioMerried2">Tidak</label>
            </div>
        </div>
    </div>
</fieldset>
<div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-5">
        <textarea name="customer_address" class="form-control" rows="3" disabled><?php echo $cstmr->customer_address; ?></textarea>
    </div>
</div>