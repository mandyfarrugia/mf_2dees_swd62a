@php
    function format_date($date) {
        $unixTimestamp = strtotime($date);
        $formattedDate = date('jS F Y', $unixTimestamp);
        return $formattedDate;
    }
@endphp