<?php
Class Location_track
{
	public static function track_address($lat,$long)
	{
		echo location;
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($long).'&sensor=false';
		$json= @file_get_contents($url);
		$data= json_decode($json);
		$status = $data->status;
		if($status=="OK")
			return $data->results[0]->formatted_address;
		else
			return false;
	}
} 