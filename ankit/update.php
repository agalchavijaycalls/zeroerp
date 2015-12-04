<?php 
include("conn.php");
include("controller.php");
class Update extends Controller
{
	public function __construct( )
	{
		
	}
	public function updateAppoint($val)
	{
		$data=json_decode($val);
		//echo "<pre>";print_r($data);		die;
		$apId = $data->ap_id;
		$toilets=$data->ap_toilets;
		$bedrooms = $data->ap_bedrooms;
		$kitchens = $data->ap_kitchens;
		//$washdry_areas = $data->ap_washdry_area;
		$living_room=$data->ap_living_room;
		$userid=$data->userid; 
							/* Appointment Personal detail insert */
		$sql="UPDATE rp_appointments SET name='".$data->ap_name."',phone='".$data->ap_phone."',appointmentStatus='".$data->ap_status."' WHERE appointmentID='".$apId."' and userID='".$userid."'";
				  mysql_query($sql);

						/* Appointment detail data insert */
						
		$sql="select * from rp_app_detail where appointmentID='".$apId."' and userID='".$userid."'";
		$qry=mysql_query($sql);
		$count=mysql_num_rows($qry);
		if($count)
		{  
			$exp_possesiondate = explode('/',$data->ap_possesion_compilation_date);
			$format_possesion_date = $exp_possesiondate[2].'-'.$exp_possesiondate[1].'-'.$exp_possesiondate[0];
			$exp_ap_availability_date = explode('/',$data->ap_availability_date);
			$format_availability_date = $exp_ap_availability_date[2].'-'.$exp_ap_availability_date[1].'-'.$exp_ap_availability_date[0];

			$sql = "UPDATE rp_app_detail SET
			geoLatitude='2',
			geoLongitude='34',
			userID='".$userid."', 
			propertyType='".$data->ap_property_type."', 
			bhkType='".$data->ap_bhk_type."', 
			passessionTime='".$format_possesion_date."', 
			ap_availability_date='".$format_availability_date."', 
			petsAllowed='".$data->ap_pets_allowed."', 
			apointmentFood='".$data->ap_food."', 
			preferredVisitTime='".$data->ap_preferred_visit_time."', 
			advertiserType='".$data->ap_advertiser_type."', 
			name='".$data->ap_name."', 
			phone='".$data->ap_phone."', 
			appointmentAlterPhone='".$data->ap_alternate_phone_no."', 
			appointmentEmail='".$data->ap_email."', 
			ownerType='".$data->ap_ownership_type."', 
			developerType='".$data->ap_developer_type."', 
			building_no_or_name='".$data->ap_building_no_name."', 
			flatNO='".$data->ap_flate_number."', 
			floorNum='".$data->ap_floor_no."', 
			apointmentWing='".$data->ap_wing."', 
			apponitmentStreet='".$data->ap_street."', 
			locality='".$data->ap_locality."', 
			subLocality='".$data->ap_sub_locality."', 
			pincode='".$data->ap_pincode."', 
			landmark='".$data->ap_landmark."', 
			securityDeposit='".$data->ap_security_deposit."',
			brokarageFee='".$data->ap_brokerage_fee."', 
			rentNegotiable='".$data->ap_rent_negotiable."', 
			securityNegotiable='".$data->ap_security_negotiable."', 
			maintainenceFee='".$data->ap_maintainance."',
			rentAmount='".$data->ap_rent_ammount."', 
			noOfFloors='".$data->ap_no_of_floor."',			
			numOfLifts='".$data->ap_no_of_lift."', 
			buildingAge='".$data->ap_age_of_building."', 
			builtupArea='".$data->ap_builtup_area."', 
			carpetArea='".$data->ap_carpet_area."', 
			numOfStory='".$data->ap_no_of_storys."', 
			serventRoom='".$data->ap_servant_room."', 
			prayerRoom='".$data->ap_prayer_room."', 
			balcony='".$data->ap_total_balcony."',
			terrace='".$data->ap_terrace."',  
			privateTerrace='".$data->ap_private_terrace."', 
			mainEnterenceFacing='".$data->ap_main_entrance_facing."', 
			powerBackup='".$data->ap_power_backup."', 
			wifiInternet='".$data->ap_wifi."', 
			waterSupply_municipal='".$data->ap_water_supply_municipal."',
			waterSupply_borewell='".$data->ap_water_supply_borewell."',
			solarWaterHeater='".$data->ap_solar_heater."',
			gatedCommunity='".$data->ap_societydata_gated_community."', 
			registeredSociety='".$data->ap_societydata_reg_society."', 
			SocietyName='".$data->ap_society_name."', 
			noOfBuilding='".$data->ap_no_of_building."', 
			societyOverheadTank='".$data->ap_societydata_society_overheadtank."', 
			boundryWall='".$data->ap_boundary_wall."', 
			cctvSurvelance='".$data->ap_societydata_cctv_servillance."', 
			smokeDetector='".$data->ap_societydata_smoke_detector."', 
			fireHyderantSystem='".$data->ap_societydata_fire_hydrant_system."', 
			security='".$data->ap_societydata_security."', 
			clubHouse='".$data->ap_societydata_club_house."', 
			swimmingPool='".$data->ap_societydata_swiming_pool."', 
			gym='".$data->ap_societydata_gym."', 
			multipurposHall='".$data->ap_societydata_multi_purpose."', 
			gardenLawn='".$data->ap_garden_lawn."',
			numOfToilet='".$data->ap_no_of_toilet."', 
			numofKitchens='".$data->ap_total_kitchen."', 
			numOfLivingRooms='".$data->ap_total_livingroom."', 
			numOfBedrooms='".$data->ap_total_bedroom."',
			plotArea='".$data->ap_pricing_plot_area."',
			salesStatus='".$data->ap_pricing_sale_status."',			
			waterBackUp_grounded_tank='".$data->ap_waterbackup_grounded_tank."',
			waterBackUp_terrace_tank='".$data->ap_waterbackup_terrace_tank."',
			24hourswatersupply='".$data->ap_society_ck_24HWS."',
			aerobicRoom='".$data->ap_society_ck_aerobic_room."',
			amphithreater='".$data->ap_society_ck_amphithreater."',
			atm_or_bank='".$data->ap_society_ck_atm_bank."',
			banquetHall='".$data->ap_society_ck_banquet_hall."',
			barbequePit='".$data->ap_society_ck_barbeque_pit."',
			basketBall_or_TennisCourt='".$data->ap_society_ck_basketball_tennis_court."',
			centralizedAC='".$data->ap_society_ck_centralized_ac."',
			confrenceRoom='".$data->ap_society_ck_conference_room."',
			dayCareCenter='".$data->ap_society_ck_day_care_center."',
			dthTvFacilities='".$data->ap_society_ck_dth_tv_facility."',
			earlyLearningCentre_playGroup='".$data->ap_society_ck_early_learning_play_group."',
			golfCource='".$data->ap_society_ck_golf_cource."',
			guestAccomadation='".$data->ap_society_ck_guest_accomadation."',
			indoorGamesRoom='".$data->ap_society_ck_indoor_games_room."',
			indoorSquash_or_bedmintonCourt='".$data->ap_society_ck_indoor_bedminton_court."',
			intercom='".$data->ap_society_ck_intercom."',
			kidsClub='".$data->ap_society_ck_kids_club."',
			kidsPlayArea='".$data->ap_society_ck_kids_play_area."',
			laundryService='".$data->ap_society_ck_laundry_service."',
			meditiationCenter='".$data->ap_society_ck_meditation_center."',
			pavedCompound='".$data->ap_society_ck_paved_comound."',
			property_or_MaintenaceStaff='".$data->ap_society_ck_property_maintenace_staff."',
			rainWaterHarvesting='".$data->ap_society_ck_rain_water_harvesting."',
			recreationalPool_or_Facilities='".$data->ap_society_ck_recreational_facilities."',
			rentableCommunitySpace='".$data->ap_society_ck_rentable_community_space."',
			reserverdParking='".$data->ap_society_ck_reserverd_parking."',
			school='".$data->ap_society_ck_school."',
			service_or_GoodsLift='".$data->ap_society_ck_service_goods_lift."',
			sevageTreatmentPlan='".$data->ap_society_ck_sevage_treatment_plan."',
			shoopingCenter_or_retailShop='".$data->ap_society_ck_shooping_retail."',
			skatingCourt='".$data->ap_society_ck_skating_court."',
			strollingCycling_or_joggingTrack='".$data->ap_society_ck_strolling_cycling_jogging."',
			vaastuComplaint='".$data->ap_society_ck_vaastu_complaint."',
			visitorParking='".$data->ap_society_ck_visitor_parking."',
			waitingLounge='".$data->ap_society_ck_waiting_lounge."',
			wasteDisposal='".$data->ap_society_ck_waste_disposal."',leaseType='".$data->ap_lease_type."' WHERE appointmentID=$apId";
			mysql_query($sql);


		}	
		else
		{ 
			$exp_possesiondate = explode('/',$data->ap_possesion_compilation_date);
			$format_possesion_date = $exp_possesiondate[2].'-'.$exp_possesiondate[1].'-'.$exp_possesiondate[0];
			$exp_ap_availability_date = explode('/',$data->ap_availability_date);
			echo $format_availability_date = $exp_ap_availability_date[2].'-'.$exp_ap_availability_date[1].'-'.$exp_ap_availability_date[0];

		$sql = "INSERT INTO rp_app_detail(
			appointmentID, 
			geoLatitude, 
			geoLongitude, 
			userID, 
			propertyType, 
			bhkType, 
			passessionTime, 
			ap_availability_date, 
			petsAllowed, 
			apointmentFood, 
			preferredVisitTime, 
			advertiserType, 
			name, 
			phone, 
			appointmentAlterPhone, 
			appointmentEmail, 
			ownerType, 
			developerType, 
			building_no_or_name, 
			flatNO, 
			floorNum, 
			apointmentWing, 
			apponitmentStreet, 
			locality, 
			subLocality, 
			pincode, 
			landmark, 
			securityDeposit,
			brokarageFee, 
			rentNegotiable, 
			securityNegotiable, 
			maintainenceFee,
			rentAmount, 
			noOfFloors,			
			numOfLifts, 
			buildingAge, 
			builtupArea, 
			carpetArea, 
			numOfStory, 
			serventRoom, 
			prayerRoom, 
			balcony,
			terrace,  
			privateTerrace, 
			mainEnterenceFacing, 
			powerBackup, 
			wifiInternet, 
			waterSupply_municipal,
			waterSupply_borewell,
			solarWaterHeater,
			gatedCommunity, 
			registeredSociety, 
			SocietyName, 
			noOfBuilding, 
			societyOverheadTank, 
			boundryWall, 
			cctvSurvelance, 
			smokeDetector, 
			fireHyderantSystem, 
			security, 
			clubHouse, 
			swimmingPool, 
			gym, 
			multipurposHall, 
			gardenLawn,
			numOfToilet, 
			numofKitchens, 
			numOfLivingRooms, 
			numOfBedrooms,
			plotArea,
			salesStatus,			
			waterBackUp_grounded_tank,
			waterBackUp_terrace_tank,
			24hourswatersupply,
			aerobicRoom,
			amphithreater,
			atm_or_bank,
			banquetHall,
			barbequePit,
			basketBall_or_TennisCourt,
			centralizedAC,
			confrenceRoom,
			dayCareCenter,
			dthTvFacilities,
			earlyLearningCentre_playGroup,
			golfCource,
			guestAccomadation,
			indoorGamesRoom,
			indoorSquash_or_bedmintonCourt,
			intercom,
			kidsClub,
			kidsPlayArea,
			laundryService,
			meditiationCenter,
			pavedCompound,
			property_or_MaintenaceStaff,
			rainWaterHarvesting,
			recreationalPool_or_Facilities,
			rentableCommunitySpace,
			reserverdParking,
			school,
			service_or_GoodsLift,
			sevageTreatmentPlan,
			shoopingCenter_or_retailShop,
			skatingCourt,
			strollingCycling_or_joggingTrack,
			vaastuComplaint,
			visitorParking,
			waitingLounge,
			wasteDisposal,
			leaseType
			 )
		VALUES('".$apId."',
			'2',
			'3',
			'".$userid."',
			'".$data->ap_property_type."',
			'".$data->ap_bhk_type."',
			'".$format_possesion_date."',
			'".$format_availability_date."',
			'".$data->ap_pets_allowed."',
			'".$data->ap_food."',
			'".$data->ap_preferred_visit_time."',
			'".$data->ap_advertiser_type."',
			'".$data->ap_name."',
			'".$data->ap_phone."',
			'".$data->ap_alternate_phone_no."',
			'".$data->ap_email."',
			'".$data->ap_ownership_type."',
			'".$data->ap_developer_type."',
			'".$data->ap_building_no_name."',
			'".$data->ap_flate_number."',
			'".$data->ap_floor_no."',
			'".$data->ap_wing."',
			'".$data->ap_street."',
			'".$data->ap_locality."',
			'".$data->ap_sub_locality."',
			'".$data->ap_pincode."',
			'".$data->ap_landmark."',
			'".$data->ap_security_deposit."',
			'".$data->ap_brokerage_fee."',
			'".$data->ap_rent_negotiable."',
			'".$data->ap_security_negotiable."',
			'".$data->ap_maintainance."',
			'".$data->ap_rent_ammount."',
			'".$data->ap_no_of_floor."',
			'".$data->ap_no_of_lift."',
			'".$data->ap_age_of_building."',
			'".$data->ap_builtup_area."',
			'".$data->ap_carpet_area."',
			'".$data->ap_no_of_storys."',
			'".$data->ap_servant_room."',
			'".$data->ap_prayer_room."',
			'".$data->ap_total_balcony."',
			'".$data->ap_terrace."',
			'".$data->ap_private_terrace."',
			'".$data->ap_main_entrance_facing."',
			'".$data->ap_power_backup."',
			'".$data->ap_wifi."',
			'".$data->ap_water_supply_municipal."',
			'".$data->ap_water_supply_borewell."',
			'".$data->ap_solar_heater."',
			'".$data->ap_societydata_gated_community."',
			'".$data->ap_societydata_reg_society."',
			'".$data->ap_society_name."',
			'".$data->ap_no_of_building."',
			'".$data->ap_societydata_society_overheadtank."',
			'".$data->ap_boundary_wall."',
			'".$data->ap_societydata_cctv_servillance."',
			'".$data->ap_societydata_smoke_detector."',
			'".$data->ap_societydata_fire_hydrant_system."',
			'".$data->ap_societydata_security."',
			'".$data->ap_societydata_club_house."',
			'".$data->ap_societydata_swiming_pool."',
			'".$data->ap_societydata_gym."',
			'".$data->ap_societydata_multi_purpose."',
			'".$data->ap_garden_lawn."',
			'".$data->ap_no_of_toilet."',
			'".$data->ap_total_kitchen."',
			'".$data->ap_total_livingroom."',
			'".$data->ap_total_bedroom."',
			'".$data->ap_pricing_plot_area."',
			'".$data->ap_pricing_sale_status."',
			'".$data->ap_waterbackup_grounded_tank."',
			'".$data->ap_waterbackup_terrace_tank."',
			'".$data->ap_society_ck_24HWS."',
			'".$data->ap_society_ck_aerobic_room."',
			'".$data->ap_society_ck_amphithreater."',
			'".$data->ap_society_ck_atm_bank."',
			'".$data->ap_society_ck_banquet_hall."',
			'".$data->ap_society_ck_barbeque_pit."',
			'".$data->ap_society_ck_basketball_tennis_court."',
			'".$data->ap_society_ck_centralized_ac."',
			'".$data->ap_society_ck_conference_room."',
			'".$data->ap_society_ck_day_care_center."',
			'".$data->ap_society_ck_dth_tv_facility."',
			'".$data->ap_society_ck_early_learning_play_group."',
			'".$data->ap_society_ck_golf_cource."',
			'".$data->ap_society_ck_guest_accomadation."',
			'".$data->ap_society_ck_indoor_games_room."',
			'".$data->ap_society_ck_indoor_bedminton_court."',
			'".$data->ap_society_ck_intercom."',
			'".$data->ap_society_ck_kids_club."',
			'".$data->ap_society_ck_kids_play_area."',
			'".$data->ap_society_ck_laundry_service."',
			'".$data->ap_society_ck_meditation_center."',
			'".$data->ap_society_ck_paved_comound."',
			'".$data->ap_society_ck_property_maintenace_staff."',
			'".$data->ap_society_ck_rain_water_harvesting."',
			'".$data->ap_society_ck_recreational_facilities."',
			'".$data->ap_society_ck_rentable_community_space."',
			'".$data->ap_society_ck_reserverd_parking."',
			'".$data->ap_society_ck_school."',
			'".$data->ap_society_ck_service_goods_lift."',
			'".$data->ap_society_ck_sevage_treatment_plan."',
			'".$data->ap_society_ck_shooping_retail."',
			'".$data->ap_society_ck_skating_court."',
			'".$data->ap_society_ck_strolling_cycling_jogging."',
			'".$data->ap_society_ck_vaastu_complaint."',
			'".$data->ap_society_ck_visitor_parking."',
			'".$data->ap_society_ck_waiting_lounge."',
			'".$data->ap_society_ck_waste_disposal."',
			'".$data->ap_lease_type."')";
			mysql_query($sql);	

		}
							
						/* Appointment Living room detail insert and update */
		foreach($living_room as $living)
		{
		$id=$living->id;
		$qry="select * from rp_app_livingroom where appointmentID='".$apId."' and livingRoomID='".$id."'";
		$q=mysql_query($qry);
		$var=mysql_num_rows($q);
		if($var)
		{    
			$sql="UPDATE rp_app_livingroom SET sofa='".$living->sofa."',dinningTable='".$living->dining_table."',ac='".$living->ac."',tv='".$living->tv."',shoeRack='".$living->shoe_rack."',flooringType='".$living->flooring_type."',falseCeiling='".$living->false_ceiling."' WHERE appointmentID='".$apId."' and livingRoomID='".$id."'";
					 mysql_query($sql);	
		}
		else
		{ 
			 $query = "INSERT INTO rp_app_livingroom(livingRoomID,appointmentID,sofa,dinningTable,ac,tv,shoeRack,flooringType,falseCeiling)VALUES('".$id."','".$apId."','".$living->sofa."','".$living->dining_table."','".$living->ac."','".$living->tv."','".$living->shoe_rack."','".$living->flooring_type."','".$living->false_ceiling."')";
					 mysql_query($query);
		}
		}	

		/* Appointment toilet detail insert and update */
		foreach($toilets as $toilet)
		{
		$id=$toilet->id;
		$sql="select * from rp_app_toilets where appointmentID='".$apId."' and toiletID='".$id."'";
		$qry=mysql_query($sql);
		$count=mysql_num_rows($qry);
		if($count)
		{    
		 $sql="UPDATE rp_app_toilets SET type='".$toilet->type."',Style='".$toilet->style."',hotWaterSupply='".$toilet->hot_water_supply."',glassPartition='".$toilet->glass_partition."',showerPartition='".$toilet->shower_curtain."',bathTub='".$toilet->bath_tub."',cabinate='".$toilet->cabinet."',window='".$toilet->window."',exhaustFan='".$toilet->exhaust_fan."',flooringType='".$toilet->flooring_type."' WHERE appointmentID='".$apId."' and toiletID='".$id."'";
					 mysql_query($sql);	
		}
		else
		{ 
			 $query = "INSERT INTO rp_app_toilets(toiletID,appointmentID,type, Style, hotWaterSupply, glassPartition, showerPartition, bathTub, cabinate,window, exhaustFan, flooringType)VALUES('".$id."','".$apId."','".$toilet->type."','".$toilet->style."','".$toilet->hot_water_supply."','".$toilet->glass_partition."','".$toilet->shower_curtain."','".$toilet->bath_tub."','".$toilet->cabinet."','".$toilet->window."','".$toilet->exhaust_fan."','".$toilet->flooring_type."')"; 
					 mysql_query($query);

		}
		}
			/* Appointment Bedroom detail insert and update */
		foreach($bedrooms as $bedroom)
		{
		$id=$bedroom->id;
		$sql="select * from rp_app_bedrooms where appointmentID='".$apId."' and bedroomID='".$id."'";
		$qry=mysql_query($sql);
		$count=mysql_num_rows($qry);
		if($count)
		{    
		 $sql="UPDATE rp_app_bedrooms SET bed='".$bedroom->bed."',ac='".$bedroom->ac."',tv='".$bedroom->tv."',dressingTable='".$bedroom->dressing_table."',wardrobe='".$bedroom->wardrobe."',window='".$bedroom->window."',attachedBalconey='".$bedroom->attached_balconey."',attachedBathroom='".$bedroom->attached_bathroom."',flooringType='".$bedroom->flooring_type."',falseceiling='".$bedroom->false_ceiling."' WHERE appointmentID='".$apId."' and bedroomID='".$id."'";
					 mysql_query($sql);	
		}
		else
		{ 
			 $query = "INSERT INTO rp_app_bedrooms(bedroomID,appointmentID,bed,ac,tv,dressingTable,wardrobe,window,attachedBalconey,attachedBathroom,flooringType,falseceiling)VALUES('".$id."','".$apId."','".$bedroom->bed."','".$bedroom->ac."','".$bedroom->tv."','".$bedroom->dressing_table."','".$bedroom->wardrobe."','".$bedroom->window."','".$bedroom->attached_balconey."','".$bedroom->attached_bathroom."','".$bedroom->flooring_type."','".$bedroom->false_ceiling."')"; 
					 mysql_query($query);
		}
		}


		/* Appointment kitchen detail insert and update */
		foreach($kitchens as $kitchen)
		{
		$id=$kitchen->id;
		$sql="select * from rp_app_kitchens where appointmentID='".$apId."' and kitchenID='".$id."'";
		$qry=mysql_query($sql);
		$count=mysql_num_rows($qry);
		if($count)
		{    
		 $sql="UPDATE rp_app_kitchens SET cabinet='".$kitchen->cabinet."',gaspipLine='".$kitchen->gas_pipeline."',refrigerator='".$kitchen->refrigerator."',waterPurifier='".$kitchen->water_purifier."',microwave='".$kitchen->microwave."',loft='".$kitchen->loft."',plateformMaterial='".$kitchen->platform_material."',chimneyExhaust='".$kitchen->chimney_exhaust."' WHERE appointmentID='".$apId."' and kitchenID='".$id."'";
					 mysql_query($sql);	
		}
		else
		{ 
			 $query = "INSERT INTO rp_app_kitchens(kitchenID,appointmentID,cabinet,gaspipLine,refrigerator,waterPurifier,microwave,loft,plateformMaterial,chimneyExhaust)VALUES('".$id."','".$apId."','".$kitchen->cabinet."','".$kitchen->gas_pipeline."','".$kitchen->refrigerator."','".$kitchen->water_purifier."','".$kitchen->microwave."','".$kitchen->loft."','".$kitchen->platform_material."','".$kitchen->chimney_exhaust."')"; 
					 mysql_query($query);

		}
		}


		/* Appointment Washdry Area detail insert and update */
		/*foreach($washdry_areas as $washdry_area)
		{
			$id=$washdry_area->id;
			$sql="select * from rp_washdry_area where appointmentID='".$apId."' and washdryID='".$id."'";
			$qry=mysql_query($sql);
			$count=mysql_num_rows($qry);
			if($count)
			{    
				$sql="UPDATE rp_washdry_area SET washingMachine='".$washdry_area->washing_machine."',flooringType='".$washdry_area->flooring_type."' WHERE appointmentID='".$apId."' and washdryID='".$id."'";
							 mysql_query($sql);	
			}
			else
			{ 
				 $query = "INSERT INTO rp_washdry_area(washdryID,appointmentID,washingMachine,flooringType)VALUES('".$id."','".$apId."','".$washdry_area->washing_machine."','".$washdry_area->flooring_type."')"; 
						 mysql_query($query);
			}
		
		}*/ 
		$i=1;
		 if($i == 1)
	      {
		     $msg = array(
							'status'	=>	'success',
							'code'		=>	'200',
							'data'		=>	array(
													'message'	

												=>	'Appointment updated successfully.'
												)
						
						  );
               return json_encode($msg);
	      }
	      else{
	      	$msg = array(
							'status'	=>	'error',
							'code'		=>	'400',
							'data'		=>	array(
													'message'	
	=>	'error details.'
												)
						
						);
                         return json_encode($msg);
			}
	}	
}
$var=$_POST['jsondata'];
$obj= new Update();
if($var)
{
		$result=$obj->updateAppoint($var);
		echo $result;
}
else{
	      	$msg = array(
							'status'	=>	'error',
							'code'		=>	'400',
							'data'		=>	array(
													'message'	
=>	'error details.'
												  )
						
		);
                         return json_encode($msg);
	}
?>