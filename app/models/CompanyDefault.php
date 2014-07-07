<?php

class CompanyDefault extends \Eloquent {

	protected $table = 'company_defaults'

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

}