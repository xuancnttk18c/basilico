<?php
$default_settings = [
    'width' => '100%',
    'height' => '500px',
    'chart_data' => '["Year", "Sales", "Expenses"],["2013", 1000, 400],["2014", 1170, 460],["2015", 660, 1120],["2016", 1030, 540]',
    'chart_options' => 'title: "Company Performance", hAxis: { titleTextStyle: {color: "#333"}}, vAxis: {minValue: 0}'
];
$settings = array_merge($default_settings, $settings);
$chart_data = '[]';
if (!empty($settings['chart_data'])){
    $chart_data = rawurlencode($settings['chart_data']);
}

$chart_options = '';
if (!empty($settings['chart_options'])){
    $chart_options = rawurlencode($settings['chart_options']);
}
$chart_types = $settings['chart_types'];
/* chart setting */
$chart_setting = array(
    "data-type='$chart_types'",
    "data-datas='$chart_data'",
    "data-options='$chart_options'",
);
?>
<div class="pxl-google-chart" <?php echo implode(' ', $chart_setting); ?>>
    <div id="chart-div" class="chart-div" style="width:<?php echo esc_attr($settings['width']); ?>; height: <?php echo esc_attr($settings['height']); ?>;">
    </div>
</div>