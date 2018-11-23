<?php
namespace Kris\LaravelFormBuilder;

use Illuminate\Http\Request as Request;

interface ISubmitForm {
    function submit(Request $request);
}