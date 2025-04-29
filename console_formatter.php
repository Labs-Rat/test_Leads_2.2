<?php
$incomingArray = [
    [
        "internal_history_id" => "2230893",
        "external_id"         => "8615",
        "external_commission" => "0.0005",
    ],
    [
        "internal_history_id" => "2230891",
        "external_id"         => "2159",
        "external_commission" => "0.0200",
    ],
    [
        "internal_history_id" => "2230892",
        "external_id"         => "5349",
        "external_commission" => "0.0060",
    ],
    [
        "internal_history_id" => "563089",
        "external_id"         => "8659",
        "external_commission" => "0.0054",
    ],
    [
        "internal_history_id" => "217403",
        "external_id"         => "1462",
        "external_commission" => "0.0040",
    ],
    [
        "internal_history_id" => "2230883",
        "external_id"         => "8859",
        "external_commission" => "0.0008",
    ],
    [
        "internal_history_id" => "2230581",
        "external_id"         => "5988",
        "external_commission" => "0.0040",
    ],
    [
        "internal_history_id" => "2230592",
        "external_id"         => "8659",
        "external_commission" => "0.9000",
    ],
    [
        "internal_history_id" => "208998",
        "external_id"         => "8599",
        "external_commission" => "0.0600",
    ],
    [
        "internal_history_id" => "217467",
        "external_id"         => "7612",
        "external_commission" => "0.0090",
    ],
    [
        "internal_history_id" => "2308935",
        "external_id"         => "6923",
        "external_commission" => "0.0080",
    ],
];

const COLUMN_SEPARATOR = '│';
const ROW_SEPARATOR = '─';
const CORNER_SEPARATOR = '┼';

function drawRow(array $row, array $columns)
{
    foreach ($columns as $column => $width) {
        isset($row[$column])
            ? printf("%-{$width}s " . COLUMN_SEPARATOR, $row[$column])
            : printf("%-{$width}s " . COLUMN_SEPARATOR, ROW_SEPARATOR);
    }

    echo "\n";
}

function drawSeparatorLine(array $columns)
{
    foreach ($columns as $width) {
        echo(str_repeat(ROW_SEPARATOR, $width + 1) . CORNER_SEPARATOR);
    }

    echo "\n";
}

function drawHeader(array $columns)
{
    foreach ($columns as $title => $width) {
        printf("%-{$width}s " . COLUMN_SEPARATOR, $title);
    }

    echo "\n";

    drawSeparatorLine($columns);
}

function drawTable(array $dataArray)
{
    $tableHeaders = array_keys($dataArray[array_key_first($dataArray)]);
    $columnsWidth = array_map(function ($header) {
        return strlen($header);
    }, $tableHeaders);
    $columns = array_combine($tableHeaders, $columnsWidth);

    drawHeader($columns);

    foreach ($dataArray as $row) {
        drawRow($row, $columns);
    }
}

drawTable($incomingArray);