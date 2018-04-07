<?php
include "AdelAdapterInterface.php";
include "Client.php";

foreach (glob("Adapters/*.php") as $filename)
{
    include $filename;
}

foreach (glob("Entities/*.php") as $filename)
{
    include $filename;
}