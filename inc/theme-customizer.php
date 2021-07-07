<?php

function contactInfo($wp_customize){
$wp_customize->add_section('contactInfoSection', array(
   'title' => 'Dane kontaktowe'
));
$wp_customize->add_setting('contactInfoName',array(
    'default'=>'Radzik'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoNameControl',array(
    'label'=>'Nazwa firmy',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoName'

)));


$wp_customize->add_setting('contactInfoPhone',array(
    'default'=>'+48 14 680 38 16'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoPhoneControl',array(
    'label'=>'Email',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoPhone'

)));

$wp_customize->add_setting('contactInfoEmail',array(
    'default'=>'sekretariat@radzik.com.pl'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoEmailControl',array(
    'label'=>'Email',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoEmail'

)));

$wp_customize->add_setting('contactInfoAddress',array(
    'default'=>'Straszęcin 9A'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoAddressControl',array(
    'label'=>'Adres',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoAddress'

)));
$wp_customize->add_setting('contactInfoPostCode',array(
    'default'=>'39-218 Straszęcin'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoPostCodeControl',array(
    'label'=>'Kod pocztowy',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoPostCode'

)));
$wp_customize->add_setting('contactInfoNip',array(
    'default'=>'872 000 27 12'
));

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'contactInfoNipControl',array(
    'label'=>'NIP',
    'section'=>'contactInfoSection',
    'settings'=>'contactInfoNip'

)));


}


?>