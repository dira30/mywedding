<?= $this->extend('emails/email') ?>

<?= $this->section('page') ?>
<div style="overflow-wrap:break-word;word-break:break-word;padding:19px 44px 50px;font-family:'Lato',sans-serif;">
    <p class="text-isi"><span class="text-isi-span">Ini merupakan email aktivasi untuk akun anda pada <?= base_url() ?>. Untuk melakukan aktivasi akun gunakan link berikut</span></p></center>
    
    <table style="font-family:'Lato',sans-serif;margin-bottom: 30px;margin-top: 30px" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
        <tbody>
          <tr>
            <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:'Lato',sans-serif;" align="left">

              <div align="center">
                  <a href="<?= base_url('activate-account') . '?token=' . $hash ?>" target="_blank" style="box-sizing: border-box;display: inline-block;font-family:'Lato',sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #010101; background-color: #f2f0eb; border-radius: 75px;-webkit-border-radius: 75px; -moz-border-radius: 75px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;border-top-color: #22225f; border-top-style: solid; border-top-width: 2px; border-left-color: #22225f; border-left-style: solid; border-left-width: 2px; border-right-color: #22225f; border-right-style: solid; border-right-width: 2px; border-bottom-color: #22225f; border-bottom-style: solid; border-bottom-width: 2px;">
                    <span style="display:block;padding:10px 45px;line-height:160%;"><span style="font-size: 16px; line-height: 25.6px;">AKTIVASI AKUN</span></span>
                </a>
                <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
            </div>

        </td>
    </tr>
</tbody>
</table>

<p class="text-isi">
    <span class="text-isi-span">Untuk informasi lebih lanjut silahkan kunjungi website kami 
        <a href="<?=base_url()?>"><?=base_url()?></a>
    </span>
</p>
<p class="text-isi"><b>Terima kasih</b></p>

</div>
<?= $this->endSection() ?>