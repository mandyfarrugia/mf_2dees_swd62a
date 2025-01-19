@php
    function format_date($date) {
        $unixTimestamp = strtotime($date);
        $formattedDate = date('j F Y', $unixTimestamp);
        return $formattedDate;
    }
@endphp