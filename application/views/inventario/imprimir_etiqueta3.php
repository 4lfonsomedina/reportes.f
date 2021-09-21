<?php
?>
<xml version="1.0" encoding="UTF-8">
<sure_cuts_alot version_major="1" version_minor="22" product="primera">
<project_notes title="" author="" email="" website="" notes="" category="" keyword1="" keyword2="" keyword3="" keyword4="" description="" cut_type="cut" help="none" />
<scal5_data mat_wu="<?= round(($ancho*1000)+400) ?>" mat_hu="<?= round($largo*1000) ?>" material_wu="<?=  round(($ancho*1000)+400) ?>" material_hu="<?= round($largo*1000) ?>" mat_f="5176" mat_c="4818" mat_orientation="vertical" mat_units="in" mat_zoom="1.76331" cut_machine="Primera" cut_model="Primera" tool_type="arrow" >
<pages current="0">
<page id="1" name="Page 1" color="16777215" regmark="n" guides="true" canvas="false" >
<guides></guides>
<tiles col_type="even" row_type="even" col_even="1" row_even="1" col_fixed="1" row_fixed="1" col_overlap="false" col_overlap_inch="0" row_overlap="false" row_overlap_inch="0" >
</tiles><selection></selection><objects><image img_w="2050" img_h="1570" img_dpix="72" img_dpiy="72" img_data_type="png" img_data_sz="510911" img_data="<?= str_replace("data:image/png;base64,", "", $imagen) ?>" id="164" name="cbimage.png" library="cbimage.png" layer_color="221" visible="true" locked="false" expanded="false" fill_type="color" fill_color="8947848" fill_alpha="1" stroke_type="color" stroke_color="8947848" stroke_alpha="1" stroke_width="0.1479" stroke_miter="10" stroke_cap="b" stroke_join="m" cutdraw_type="cut" style="normal" shadow_type="rounded" shadow_size="0.05" keep_aspect_ratio="true" selected="false" weld="false" tool="0" perm_group="false" path_object="false" rotate_type="angle" clip="n" >
<transform a="0.19" b="0" c="0" d="0" e="<?= round((($ancho*0.001)+0.191),6) ?>" f="0" g="10" h="10" i="1" />
</image>
<?php for($i=0;$i<count($coordenadas);$i++){ 
	$c = explode(",", $coordenadas[$i]);
	if($c[4]==0){
	?>
<shape  id="<?= $i+165 ?>" name="" library="" layer_color="56576" visible="true" locked="false" expanded="false" fill_type="none" fill_color="8947848" fill_alpha="1" stroke_type="color" stroke_color="255" stroke_alpha="1" stroke_width="0.1479" stroke_miter="10" stroke_cap="b" stroke_join="m" cutdraw_type="printcut_cut" style="normal" shadow_type="rounded" shadow_size="0.05" keep_aspect_ratio="true" selected="false" weld="false" tool="0" perm_group="false" path_object="false" rotate_type="angle" clip="n" >
<transform a="<?= $c[0] ?>" b="0" c="0" d="0" e="<?= $c[1] ?>" f="0" g="<?= round($c[2]*100,2) ?>" h="<?= round($c[3]*100,2) ?>" i="1" />
<path_list emw="1" emh="1" emx="20431" >
<pth i="1" t="e" s="2569" pts="Mp:846,4861 Lp:942,3423 Lp:942,2800 Lp:846,2441 Lp:846,2165 Z;"/>
</path_list>
</shape>
<?php }if($c[4]==1){ ?>
<shape  id="<?= $i+165 ?>" name="&lt;path&gt;" library="&lt;path&gt;" layer_color="56576" visible="true" locked="false" expanded="false" fill_type="none" fill_color="0" fill_alpha="1" stroke_type="color" stroke_color="255" stroke_alpha="1" stroke_width="1.47673" stroke_miter="10" stroke_cap="b" stroke_join="m" cutdraw_type="printcut_cut" style="normal" shadow_type="rounded" shadow_size="0.05" keep_aspect_ratio="true" selected="false" weld="false" tool="0" perm_group="false" path_object="false" rotate_type="angle" clip="n" >
<transform a="1.44482" b="0" c="0" d="0" e="1.50864" f="0" g="136.762" h="-73.9852" i="1" />
<path_list emw="1" emh="1" emx="16777" >
<pth i="1" t="u" s="512" pts="My:4158.69,3003.85 Ly:4793.47,1922.73 Ly:5305.86,1503.12 Ly:5742.13,1233.33 Ly:6254.67,1051.81 Ly:2660.28,973.19 Ly:3134.41,938.89 Ly:3646.69,858.85 Z;"/>
</path_list>
</shape>
	<?php } ?>

<?php } ?>
</objects></page>
</pages>
</scal5_data>
</sure_cuts_alot>
</xml>