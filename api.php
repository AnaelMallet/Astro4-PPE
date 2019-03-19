<?php
require_once 'MyPDO.class.php';
header("Access-Control-Allow-Origin: *");

//$conn = new mysqli("192.168.170.1", "ppe4", "astro4", "Astro4");
try 
{
	$conn = new MyPDO ('mysql:host=192.168.176.2;dbname=Astro4', 'amallet', 'P@ssw0rd');
}
catch(Exeption $e)
{
	die('error');
}

if ($_GET['action'] == 'all')
{
	$query = $conn->prepare("SELECT IDEVENT 'id_event', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `evenement` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'concert')
{
	$query = $conn->prepare("SELECT IDEVENT 'id', IDLIEUX 'id_lieux', DUREECONC 'duree', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `info_concert` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'expo')
{
	$query = $conn->prepare("SELECT IDEVENT 'id', IDLIEUX 'id_lieux', NBJOURS 'nb_jours', DATEFINEXPO 'date_fin_expo', IDPERS 'id_pers', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `info_expo` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
}

if ($_GET['action'] == 'atelier')
{
	$query = $conn->query("SELECT IDEVENT 'id', NBJOURS 'nb_jour', NBMAXPART 'nb_max_participant', IDPERS 'id_admin', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `info_atelier` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'conf')
{
	$query = $conn->query("SELECT IDEVENT 'id', IDLIEUX 'id_lieux', aide 'id_co_pers', DHFCONF 'date_heure_fin',PROBCONF 'problematique',creation 'id_pers', NOMEVENT 'nom', DATEVENT 'date_event', HOREVENT 'horaire_event', PUBEVENT 'public', RESEVENT 'resume_event', IMGEVENT 'image' FROM `info_conference` ORDER BY IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);
	
}

if ($_GET['action'] == 'register')
{
	$query = $conn->prepare("INSERT INTO personne (NOMPERS, PRENOMPERS, TELPERS, MAILPERS, LOGINPERS, MDPPERS) VALUE ('".$_GET['nom']."', '".$_GET['prenom']."', '".$_GET['phone']."', '".$_GET['mail']."', '".$_GET['login']."', '".$_GET['password']."')");
	$query->execute();

	$query = $conn->prepare("INSERT INTO client (IDPERS, AGECLI) VALUES ((SELECT MAX(IDPERS) FROM personne), ".$_GET['age'].")");
	$query->execute();

}
if ($_GET['action'] == 'reservation')
{
	$query = $conn->prepare("SELECT IDRESERV 'id_reserv', R.IDEVENT 'id', R.IDPERS 'id_pers', NBPLACE 'nb_place' , NOMEVENT 'nom_event', IMGEVENT 'img_event' FROM RESERVATION R INNER JOIN EVENEMENT E ON E.IDEVENT = R.IDEVENT");
	$query->execute();
	$result = $query->fetchAll();
	$res['event'] = $result;
	echo json_encode($res);


}
die();