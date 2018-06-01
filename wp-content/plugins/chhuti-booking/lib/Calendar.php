<?php

namespace Chhuti\Plugins\Booking;

class Calendar 
{
  /**
   * @var array
   */
  private $bookingData;

  /**
   * @var string
   */
  private $linkUrl;

  /**
   * @var array
   */
  private $html;

  const CALENDAR_DAYS_TO_SHOW = 30;

  public function __construct(array $bookingData)
  {
    $this->bookingData = $bookingData;
    $this->linkUrl = get_site_url() .'/wp-content/plugins/chhuti-booking/views/booking-form.php';
  }

  public function getCalendar()
  {

    $html[] = '<div class="calendar">';

    for($i = 0; $i < self::CALENDAR_DAYS_TO_SHOW; $i++) {
      $date = strtotime('+'. $i .' day');
      $dateYmd = date('Y-m-d', $date);

      $class = $this->getDivClasses($dateYmd);
      $url = $this->linkUrl = get_site_url() .'/wp-content/plugins/chhuti-booking/js/chhuti.js' .'?date='. $date;

      $html[] = '<div class="'. $class .'">';
      $html[] = '<button type="button" data-toggle="modal" data-target="#myModal" data-date="'.$dateYmd.'">';
      $html[] = '<p class="weekday">'. date('l', $date) .'</p>';
      $html[] = '<p class="day">'. date('j', $date) .'</p>';
      if($i == 0 || date('j', $date) == 1) {
        $html[] = '<p class="month-year">'. date('M', $date) .' '. date('Y', $date) .'</p>';
      }
      $html[] = '</button>';
      $html[] = '</div>';

    }

    $html[] = '</div>';
    $html[] = '<div class="modal fade" id="myModal" tabindex="-1">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title caps"><strong>Guest Details</strong></h4>
                                         </div>
                                         <div class="modal-body">
                                             <div class="form-group">
                                                 <div class="input-group">
                                                     <div class="form-group">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][5][m_type]"
                                                                id="ipt_fsqm_form_3_design_5_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][5][type]"
                                                                id="ipt_fsqm_form_3_design_5_type" value="clear"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="clear-both"></div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][8][m_type]"
                                                                id="ipt_fsqm_form_3_design_8_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][8][type]"
                                                                id="ipt_fsqm_form_3_design_8_type" value="col_third"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][4][m_type]"
                                                                    id="ipt_fsqm_form_3_mcq_4_m_type" value="mcq"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][4][type]"
                                                                    id="ipt_fsqm_form_3_mcq_4_type" value="slider"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner side_margin">
                                                                 <label class="ipt_uif_question_title ipt_uif_label"
                                                                        for="ipt_fsqm_form_3_mcq_4_value">Adults<span
                                                                         class="ipt_uif_question_required">*</span></label>
                                                                 <div class="ipt_uif_question_content">
                                                                     <div class="ipt_uif_empty_box ipt_uif_slider_box">
                                                                         <input data-floats="1" type="number"
                                                                                min="6" max="300" step="1"
                                                                                data-nomin="" data-show-count=""
                                                                                data-labels="{first:false,last:false,rest:false,labels:[&quot;&quot;,&quot;&quot;]}"
                                                                                data-prefix="" data-suffix=""
                                                                                class="ipt_uif_slider check_me validate[funcCall[iptUIFSliderVal]]"
                                                                                data-min="6" data-max="300"
                                                                                data-step="1"
                                                                                name="ipt_fsqm_form_3[mcq][4][value]"
                                                                                id="ipt_fsqm_form_3_mcq_4_value"
                                                                                value="6" data-vertical=""
                                                                                data-height="300">
                                                                         <div class="ipt_uif_slider_single ipt_uif_slider_div ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all ui-slider-pips ui-slider-float">
                                                                     <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                                           tabindex="0" style="left: 0%;"><span
                                                                             class="ui-slider-tip">6</span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-first ui-slider-pip-hide ui-slider-pip-6 ui-slider-pip-initial ui-slider-pip-selected"
                                                                                 style="left: 0%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="6"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-20"
                                                                                 style="left: 4.7619%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="20"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-34"
                                                                                 style="left: 9.5238%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="34"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-48"
                                                                                 style="left: 14.2857%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="48"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-62"
                                                                                 style="left: 19.0476%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="62"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-76"
                                                                                 style="left: 23.8095%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="76"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-90"
                                                                                 style="left: 28.5714%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="90"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-104"
                                                                                 style="left: 33.3333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="104"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-118"
                                                                                 style="left: 38.0952%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="118"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-132"
                                                                                 style="left: 42.8571%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="132"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-146"
                                                                                 style="left: 47.6190%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="146"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-160"
                                                                                 style="left: 52.3810%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="160"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-174"
                                                                                 style="left: 57.1429%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="174"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-188"
                                                                                 style="left: 61.9048%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="188"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-202"
                                                                                 style="left: 66.6667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="202"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-216"
                                                                                 style="left: 71.4286%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="216"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-230"
                                                                                 style="left: 76.1905%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="230"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-244"
                                                                                 style="left: 80.9524%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="244"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-258"
                                                                                 style="left: 85.7143%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="258"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-272"
                                                                                 style="left: 90.4762%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="272"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-286"
                                                                                 style="left: 95.2381%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="286"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-last ui-slider-pip-hide ui-slider-pip-300"
                                                                                 style="left: 100%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="300"></span></span>
                                                                         </div>
                                                                     </div>
                                                                     <div class="clear-both"></div>
                                                                 </div>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                             <div class="clear-both"></div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][9][m_type]"
                                                                id="ipt_fsqm_form_3_design_9_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][9][type]"
                                                                id="ipt_fsqm_form_3_design_9_type" value="col_third"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][3][m_type]"
                                                                    id="ipt_fsqm_form_3_mcq_3_m_type" value="mcq"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][3][type]"
                                                                    id="ipt_fsqm_form_3_mcq_3_type" value="slider"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner side_margin">
                                                                 <label class="ipt_uif_question_title ipt_uif_label"
                                                                        for="ipt_fsqm_form_3_mcq_3_value">Children
                                                                     (3-10 yrs)<span
                                                                             class="ipt_uif_question_required">*</span></label>
                                                                 <div class="ipt_uif_question_content">
                                                                     <div class="ipt_uif_empty_box ipt_uif_slider_box">
                                                                         <input data-floats="1" type="number"
                                                                                min="1" max="50" step="1"
                                                                                data-nomin="" data-show-count=""
                                                                                data-labels="{&quot;first&quot;:false,&quot;last&quot;:false,&quot;rest&quot;:false,&quot;labels&quot;:[&quot;&quot;]}"
                                                                                data-prefix="" data-suffix=""
                                                                                class="ipt_uif_slider check_me validate[funcCall[iptUIFSliderVal]]"
                                                                                data-min="1" data-max="50"
                                                                                data-step="1"
                                                                                name="ipt_fsqm_form_3[mcq][3][value]"
                                                                                id="ipt_fsqm_form_3_mcq_3_value"
                                                                                value="1" data-vertical=""
                                                                                data-height="300">
                                                                         <div class="ipt_uif_slider_single ipt_uif_slider_div ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all ui-slider-pips ui-slider-float">
                                                                     <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                                           tabindex="0" style="left: 0%;"><span
                                                                             class="ui-slider-tip">1</span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-first ui-slider-pip-hide ui-slider-pip-1 ui-slider-pip-initial ui-slider-pip-selected"
                                                                                 style="left: 0%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="1"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-2"
                                                                                 style="left: 2.0408%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="2"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-3"
                                                                                 style="left: 4.0816%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="3"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-4"
                                                                                 style="left: 6.1224%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="4"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-5"
                                                                                 style="left: 8.1633%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="5"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-6"
                                                                                 style="left: 10.2041%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="6"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-7"
                                                                                 style="left: 12.2449%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="7"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-8"
                                                                                 style="left: 14.2857%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="8"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-9"
                                                                                 style="left: 16.3265%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="9"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-10"
                                                                                 style="left: 18.3673%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="10"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-11"
                                                                                 style="left: 20.4082%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="11"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-12"
                                                                                 style="left: 22.4490%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="12"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-13"
                                                                                 style="left: 24.4898%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="13"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-14"
                                                                                 style="left: 26.5306%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="14"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-15"
                                                                                 style="left: 28.5714%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="15"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-16"
                                                                                 style="left: 30.6122%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="16"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-17"
                                                                                 style="left: 32.6531%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="17"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-18"
                                                                                 style="left: 34.6939%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="18"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-19"
                                                                                 style="left: 36.7347%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="19"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-20"
                                                                                 style="left: 38.7755%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="20"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-21"
                                                                                 style="left: 40.8163%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="21"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-22"
                                                                                 style="left: 42.8571%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="22"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-23"
                                                                                 style="left: 44.8980%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="23"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-24"
                                                                                 style="left: 46.9388%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="24"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-25"
                                                                                 style="left: 48.9796%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="25"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-26"
                                                                                 style="left: 51.0204%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="26"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-27"
                                                                                 style="left: 53.0612%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="27"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-28"
                                                                                 style="left: 55.1020%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="28"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-29"
                                                                                 style="left: 57.1429%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="29"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-30"
                                                                                 style="left: 59.1837%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="30"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-31"
                                                                                 style="left: 61.2245%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="31"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-32"
                                                                                 style="left: 63.2653%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="32"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-33"
                                                                                 style="left: 65.3061%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="33"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-34"
                                                                                 style="left: 67.3469%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="34"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-35"
                                                                                 style="left: 69.3878%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="35"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-36"
                                                                                 style="left: 71.4286%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="36"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-37"
                                                                                 style="left: 73.4694%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="37"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-38"
                                                                                 style="left: 75.5102%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="38"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-39"
                                                                                 style="left: 77.5510%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="39"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-40"
                                                                                 style="left: 79.5918%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="40"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-41"
                                                                                 style="left: 81.6327%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="41"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-42"
                                                                                 style="left: 83.6735%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="42"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-43"
                                                                                 style="left: 85.7143%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="43"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-44"
                                                                                 style="left: 87.7551%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="44"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-45"
                                                                                 style="left: 89.7959%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="45"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-46"
                                                                                 style="left: 91.8367%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="46"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-47"
                                                                                 style="left: 93.8776%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="47"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-48"
                                                                                 style="left: 95.9184%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="48"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-49"
                                                                                 style="left: 97.9592%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="49"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-last ui-slider-pip-hide ui-slider-pip-50"
                                                                                 style="left: 100%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="50"></span></span>
                                                                         </div>
                                                                     </div>
                                                                     <div class="clear-both"></div>
                                                                 </div>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                             <div class="clear-both"></div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][10][m_type]"
                                                                id="ipt_fsqm_form_3_design_10_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][10][type]"
                                                                id="ipt_fsqm_form_3_design_10_type" value="col_third"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][2][m_type]"
                                                                    id="ipt_fsqm_form_3_mcq_2_m_type" value="mcq"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[mcq][2][type]"
                                                                    id="ipt_fsqm_form_3_mcq_2_type" value="slider"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner side_margin">
                                                                 <label class="ipt_uif_question_title ipt_uif_label"
                                                                        for="ipt_fsqm_form_3_mcq_2_value">Driver/Assistant<span
                                                                         class="ipt_uif_question_required">*</span></label>
                                                                 <div class="ipt_uif_question_content">
                                                                     <div class="ipt_uif_empty_box ipt_uif_slider_box">
                                                                         <input data-floats="1" type="number"
                                                                                min="1" max="25" step="1"
                                                                                data-nomin="" data-show-count=""
                                                                                data-labels="{&quot;first&quot;:false,&quot;last&quot;:false,&quot;rest&quot;:false,&quot;labels&quot;:[&quot;&quot;]}"
                                                                                data-prefix="" data-suffix=""
                                                                                class="ipt_uif_slider check_me validate[funcCall[iptUIFSliderVal]]"
                                                                                data-min="1" data-max="25"
                                                                                data-step="1"
                                                                                name="ipt_fsqm_form_3[mcq][2][value]"
                                                                                id="ipt_fsqm_form_3_mcq_2_value"
                                                                                value="1" data-vertical=""
                                                                                data-height="300">
                                                                         <div class="ipt_uif_slider_single ipt_uif_slider_div ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all ui-slider-pips ui-slider-float">
                                                                     <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                                           tabindex="0" style="left: 0%;"><span
                                                                             class="ui-slider-tip">1</span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-first ui-slider-pip-hide ui-slider-pip-1 ui-slider-pip-initial ui-slider-pip-selected"
                                                                                 style="left: 0%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="1"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-2"
                                                                                 style="left: 4.1667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="2"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-3"
                                                                                 style="left: 8.3333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="3"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-4"
                                                                                 style="left: 12.5000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="4"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-5"
                                                                                 style="left: 16.6667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="5"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-6"
                                                                                 style="left: 20.8333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="6"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-7"
                                                                                 style="left: 25.0000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="7"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-8"
                                                                                 style="left: 29.1667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="8"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-9"
                                                                                 style="left: 33.3333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="9"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-10"
                                                                                 style="left: 37.5000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="10"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-11"
                                                                                 style="left: 41.6667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="11"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-12"
                                                                                 style="left: 45.8333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="12"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-13"
                                                                                 style="left: 50.0000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="13"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-14"
                                                                                 style="left: 54.1667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="14"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-15"
                                                                                 style="left: 58.3333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="15"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-16"
                                                                                 style="left: 62.5000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="16"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-17"
                                                                                 style="left: 66.6667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="17"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-18"
                                                                                 style="left: 70.8333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="18"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-19"
                                                                                 style="left: 75.0000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="19"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-20"
                                                                                 style="left: 79.1667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="20"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-21"
                                                                                 style="left: 83.3333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="21"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-22"
                                                                                 style="left: 87.5000%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="22"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-23"
                                                                                 style="left: 91.6667%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="23"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-hide ui-slider-pip-24"
                                                                                 style="left: 95.8333%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="24"></span></span><span
                                                                                 class="ui-slider-pip ui-slider-pip-last ui-slider-pip-hide ui-slider-pip-25"
                                                                                 style="left: 100%"><span
                                                                                 class="ui-slider-line"></span><span
                                                                                 class="ui-slider-label"
                                                                                 data-value="25"></span></span>
                                                                         </div>
                                                                     </div>
                                                                     <div class="clear-both"></div>
                                                                 </div>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                             <div class="clear-both"></div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][40][m_type]"
                                                                id="ipt_fsqm_form_3_design_40_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][40][type]"
                                                                id="ipt_fsqm_form_3_design_40_type" value="heading"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column ipt_uif_column_full ipt_uif_conditional ipt_fsqm_container_heading"
                                                              id="ipt_fsqm_form_3_design_40" style="">
                                                             <div class="ipt_uif_column_inner">
                                                                 <h4 class="ipt_uif_heading ipt_uif_divider ipt_uif_align_left ipt_uif_divider_no_icon">
                                                                     <span class="ipt_uif_divider_text_inner">Group Type </span>
                                                                 </h4>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][26][m_type]"
                                                                id="ipt_fsqm_form_3_design_26_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][26][type]"
                                                                id="ipt_fsqm_form_3_design_26_type" value="blank_container"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <div class="ipt_uif_blank_container">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][28][m_type]"
                                                                        id="ipt_fsqm_form_3_design_28_m_type"
                                                                        value="design" class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][28][type]"
                                                                        id="ipt_fsqm_form_3_design_28_type"
                                                                        value="col_forth" class="ipt_fsqm_hf_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][24][m_type]"
                                                                        id="ipt_fsqm_form_3_pinfo_24_m_type"
                                                                        value="pinfo"
                                                                        class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][24][type]"
                                                                        id="ipt_fsqm_form_3_pinfo_24_type"
                                                                        value="p_checkbox"
                                                                        class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner side_margin">
                                                                     <div class="ipt_uif_question_content">
                                                                         <input data-num="0"
                                                                                type="checkbox"
                                                                                class="check_me ipt_uif_checkbox  filled-in"
                                                                                name="ipt_fsqm_form_3[pinfo][24][options][]"
                                                                                id="ipt_fsqm_form_3_pinfo_24_options__0"
                                                                                value="0">
                                                                         <label for="ipt_fsqm_form_3_pinfo_24_options__0"
                                                                                data-labelcon="">
                                                                             Family </label>
                                                                     </div>
                                                                     <div class="clear-both"></div>
                                                                 </div>
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][36][m_type]"
                                                                        id="ipt_fsqm_form_3_design_36_m_type"
                                                                        value="design" class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][36][type]"
                                                                        id="ipt_fsqm_form_3_design_36_type"
                                                                        value="col_forth" class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][37][m_type]"
                                                                            id="ipt_fsqm_form_3_pinfo_37_m_type"
                                                                            value="pinfo"
                                                                            class="ipt_fsqm_hf_m_type">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][37][type]"
                                                                            id="ipt_fsqm_form_3_pinfo_37_type"
                                                                            value="p_checkbox"
                                                                            class="ipt_fsqm_hf_type">
                                                                     <div class="ipt_uif_column_inner side_margin">
                                                                         <div class="ipt_uif_question_content">
                                                                             <input data-num="0"
                                                                                    type="checkbox"
                                                                                    class="check_me ipt_uif_checkbox  filled-in"
                                                                                    name="ipt_fsqm_form_3[pinfo][37][options][]"
                                                                                    id="ipt_fsqm_form_3_pinfo_37_options__0"
                                                                                    value="0">
                                                                             <label for="ipt_fsqm_form_3_pinfo_37_options__0"
                                                                                    data-labelcon="">
                                                                                 Friends </label>
                                                                         </div>
                                                                         <div class="clear-both"></div>
                                                                     </div>
                                                                 </div>
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][37][m_type]"
                                                                        id="ipt_fsqm_form_3_design_37_m_type"
                                                                        value="design" class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][37][type]"
                                                                        id="ipt_fsqm_form_3_design_37_type"
                                                                        value="col_forth" class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][38][m_type]"
                                                                            id="ipt_fsqm_form_3_pinfo_38_m_type"
                                                                            value="pinfo"
                                                                            class="ipt_fsqm_hf_m_type">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][38][type]"
                                                                            id="ipt_fsqm_form_3_pinfo_38_type"
                                                                            value="p_checkbox"
                                                                            class="ipt_fsqm_hf_type">
                                                                     <div class="ipt_uif_column_inner side_margin">
                                                                         <div class="ipt_uif_label_column column_2">
                                                                             <input data-num="0"
                                                                                    type="checkbox"
                                                                                    class="check_me ipt_uif_checkbox  filled-in"
                                                                                    name="ipt_fsqm_form_3[pinfo][38][options][]"
                                                                                    id="ipt_fsqm_form_3_pinfo_38_options__0"
                                                                                    value="0">
                                                                             <label for="ipt_fsqm_form_3_pinfo_38_options__0"
                                                                                    data-labelcon="">
                                                                                 Community </label>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][38][m_type]"
                                                                        id="ipt_fsqm_form_3_design_38_m_type"
                                                                        value="design" class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[design][38][type]"
                                                                        id="ipt_fsqm_form_3_design_38_type"
                                                                        value="col_forth" class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][39][m_type]"
                                                                            id="ipt_fsqm_form_3_pinfo_39_m_type"
                                                                            value="pinfo"
                                                                            class="ipt_fsqm_hf_m_type">
                                                                     <input type="hidden" data-sayt-exclude=""
                                                                            name="ipt_fsqm_form_3[pinfo][39][type]"
                                                                            id="ipt_fsqm_form_3_pinfo_39_type"
                                                                            value="p_checkbox"
                                                                            class="ipt_fsqm_hf_type">
                                                                     <div class="ipt_uif_question ipt_uif_question_full">
                                                                         <div class="ipt_uif_label_column column_2">
                                                                             <input data-num="0"
                                                                                    type="checkbox"
                                                                                    class="check_me ipt_uif_checkbox  filled-in"
                                                                                    name="ipt_fsqm_form_3[pinfo][39][options][]"
                                                                                    id="ipt_fsqm_form_3_pinfo_39_options__0"
                                                                                    value="0">
                                                                             <label for="ipt_fsqm_form_3_pinfo_39_options__0"
                                                                                    data-labelcon="">
                                                                                 Organization </label>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="clear-both"></div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][50][m_type]"
                                                                id="ipt_fsqm_form_3_design_50_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][50][type]"
                                                                id="ipt_fsqm_form_3_design_50_type" value="heading"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <h4 class="ipt_uif_heading ipt_uif_divider ipt_uif_align_left ipt_uif_divider_no_icon">
                                                            <span class="ipt_uif_divider_text">
                                                            <span class="ipt_uif_divider_text_inner">
                                                            Purpose </span>
                                                            </span>
                                                             </h4>
                                                             <div class="clear-both"></div>
                                                         </div>
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][41][m_type]"
                                                                id="ipt_fsqm_form_3_design_41_m_type" value="design"
                                                                class="ipt_fsqm_hf_m_type">
                                                         <input type="hidden" data-sayt-exclude=""
                                                                name="ipt_fsqm_form_3[design][41][type]"
                                                                id="ipt_fsqm_form_3_design_41_type" value="blank_container"
                                                                class="ipt_fsqm_hf_type">
                                                         <div class="ipt_uif_column_inner">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][39][m_type]"
                                                                    id="ipt_fsqm_form_3_design_39_m_type" value="design"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][39][type]"
                                                                    id="ipt_fsqm_form_3_design_39_type" value="col_forth"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][40][m_type]"
                                                                        id="ipt_fsqm_form_3_pinfo_40_m_type"
                                                                        value="pinfo"
                                                                        class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][40][type]"
                                                                        id="ipt_fsqm_form_3_pinfo_40_type"
                                                                        value="p_checkbox"
                                                                        class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner side_margin">
                                                                     <div class="ipt_uif_label_column column_2">
                                                                         <input data-num="0"
                                                                                type="checkbox"
                                                                                class="check_me ipt_uif_checkbox  filled-in"
                                                                                name="ipt_fsqm_form_3[pinfo][40][options][]"
                                                                                id="ipt_fsqm_form_3_pinfo_40_options__0"
                                                                                value="0">
                                                                         <label for="ipt_fsqm_form_3_pinfo_40_options__0"
                                                                                data-labelcon="">
                                                                             Leisure </label>
                                                                     </div>
                                                                 </div>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][32][m_type]"
                                                                    id="ipt_fsqm_form_3_design_32_m_type" value="design"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][32][type]"
                                                                    id="ipt_fsqm_form_3_design_32_type" value="col_forth"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][34][m_type]"
                                                                        id="ipt_fsqm_form_3_pinfo_34_m_type"
                                                                        value="pinfo"
                                                                        class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][34][type]"
                                                                        id="ipt_fsqm_form_3_pinfo_34_type"
                                                                        value="p_checkbox"
                                                                        class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner side_margin">
                                                                     <div class="ipt_uif_label_column column_2">
                                                                         <input data-num="0"
                                                                                type="checkbox"
                                                                                class="check_me ipt_uif_checkbox  filled-in"
                                                                                name="ipt_fsqm_form_3[pinfo][34][options][]"
                                                                                id="ipt_fsqm_form_3_pinfo_34_options__0"
                                                                                value="0">
                                                                         <label for="ipt_fsqm_form_3_pinfo_34_options__0"
                                                                                data-labelcon="">
                                                                             Research </label>
                                                                     </div>
                                                                 </div>
                                                                 <div class="clear-both"></div>
                                                             </div>
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][33][m_type]"
                                                                    id="ipt_fsqm_form_3_design_33_m_type" value="design"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][33][type]"
                                                                    id="ipt_fsqm_form_3_design_33_type" value="col_forth"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][35][m_type]"
                                                                        id="ipt_fsqm_form_3_pinfo_35_m_type"
                                                                        value="pinfo"
                                                                        class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][35][type]"
                                                                        id="ipt_fsqm_form_3_pinfo_35_type"
                                                                        value="p_checkbox"
                                                                        class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner side_margin">
                                                                     <div class="ipt_uif_label_column column_2">
                                                                         <input data-num="0"
                                                                                type="checkbox"
                                                                                class="check_me ipt_uif_checkbox  filled-in"
                                                                                name="ipt_fsqm_form_3[pinfo][35][options][]"
                                                                                id="ipt_fsqm_form_3_pinfo_35_options__0"
                                                                                value="0">
                                                                         <label for="ipt_fsqm_form_3_pinfo_35_options__0"
                                                                                data-labelcon="">
                                                                             Study </label>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][34][m_type]"
                                                                    id="ipt_fsqm_form_3_design_34_m_type" value="design"
                                                                    class="ipt_fsqm_hf_m_type">
                                                             <input type="hidden" data-sayt-exclude=""
                                                                    name="ipt_fsqm_form_3[design][34][type]"
                                                                    id="ipt_fsqm_form_3_design_34_type" value="col_forth"
                                                                    class="ipt_fsqm_hf_type">
                                                             <div class="ipt_uif_column_inner">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][36][m_type]"
                                                                        id="ipt_fsqm_form_3_pinfo_36_m_type"
                                                                        value="pinfo"
                                                                        class="ipt_fsqm_hf_m_type">
                                                                 <input type="hidden" data-sayt-exclude=""
                                                                        name="ipt_fsqm_form_3[pinfo][36][type]"
                                                                        id="ipt_fsqm_form_3_pinfo_36_type"
                                                                        value="p_checkbox"
                                                                        class="ipt_fsqm_hf_type">
                                                                 <div class="ipt_uif_column_inner side_margin">
                                                                     <div class="ipt_uif_label_column column_2">
                                                                         <input data-num="0"
                                                                                type="checkbox"
                                                                                class="check_me ipt_uif_checkbox  filled-in"
                                                                                name="ipt_fsqm_form_3[pinfo][36][options][]"
                                                                                id="ipt_fsqm_form_3_pinfo_36_options__0"
                                                                                value="0">
                                                                         <label for="ipt_fsqm_form_3_pinfo_36_options__0"
                                                                                data-labelcon="">
                                                                             Workshop </label>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#demo-2" data-dismiss="modal">Next</button>
                                         </div></div></div></div>';

   return join('', $html);
  }

  private function getDivClasses($dateYmd)
  {
    $class = 'date';

    if(array_key_exists($dateYmd, $this->bookingData)) {
      $class .= $this->getColourClass($this->bookingData[$dateYmd]);
    } else {
      $class .= ' gray';
    }

    return $class;
  }

  private function getColourClass($count)
  {
    if($count > 0 && $count < 100) {
      return ' green';
    } elseif($count >= 100 && $count < 300) {
      return ' yellow';
    } else {
      return ' red';
    }
  }

}

