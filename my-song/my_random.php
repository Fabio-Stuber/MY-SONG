<?php

/**
 * Random Core Functions
 * 
 * @package MY SONG
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Returns a random line from custom text.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function my_get_lyric() {

	// Get custom text
	$lyrics = get_option('my_song');

	// Get a random line
	$lyrics = my_random_line($lyrics);

	return $lyrics;

}

/**
 * Returns a random line from My Song.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function my_get_my_song() {

	// My Song Lyric
	$my_my_song="Schon mal versucht zu schlafen, wenn es juckt?
	Fühlt sich nicht gut an, wie auf Entzug
	Ich muss das tun
	Ich muss das, ah
	Süchtig nach Sucht, wieder flüchtig verguckt
	Ich nehme 'n Schluck, bis mein Kopf kotzt
	Schlaksig mit Schluckauf, einer geht noch
	Bis mich der Wahn oder's Genie stoppt
	Hass' meine Liebe zu allem
	Diese Liebe lieben viele, ich weiß
	Dieser scheiß Workaholic-Kack macht mich noch schneller alt
	Als jede Nacht der ganzen Welt zusammen nicht heilt
	Wer hat mich gedopt?
	Wer hat mich so süchtig gemacht?
	Mit'm Rücken zur Wand und es dann Liebe genannt
	Ich hasse dich und danke dir, Mann (danke dir, Mann)
	Denn was mir Angst macht sind Jahre
	Seit denen du sagst, du kannst warten
	Hab' mich nie getraut zu fragen, ah
	Denn was mir Angst macht sind Jahre
	Seit denen du sagst, du kannst warten
	Und „King Of Queens“ wieder vorm Schlafen
	Und keine Träume mehr
	Und keine Träume mehr
	Ein Abend Pause führt zum Leben auf'm Stepper nach'm Snickers
	Als wenn du ewig an dir arbeitest, obwohl du noch nie dick warst
	Wie die letzte stramme Woche vor dem Urlaub auf der Arbeit
	Nur danach willst du für Kollegen auch noch immer da sein
	Fühlt sich an, als sitzt du ewig übermüdet in 'nem Zug
	Doch du musstest ihn steuern, du musst, du musst, du musst, du
	Wieder aufstehen, wenn nicht zehn von fünf To-dos
	Erledigt sind, besser fünfzehn, up to you
	Geh' jeden Tag mit 'nem Lächeln auf den Abgrund zu
	Das ist nicht irgendwann mal treffen, das' 'n Rendezvous
	Und was mir Angst macht sind Jahre
	Seit denen du sagst, du kannst warten
	Hab' mich nie getraut zu fragen, ah-ah
	Was mir Angst macht sind Jahre
	Seit denen du sagst, du kannst warten
	Und „King Of Queens“ wieder vorm Schlafen
	Und keine Träume mehr
	Und keine Träume mehr
	Und immer morgens, wenn ich mich heiser
	Leise lege zu dir, verpasst hab' wie du einschläfst
	Hass' ich mich wieder dafür
	Hass' mich für alles, was ich geschafft hab'
	Bereu' den ganzen Tag
	Doch anstatt, dass ich mich änder'
	Tipp' ich im Dunklen diesen Satz";

	// Get random line
	$my_my_song = my_random_line($my_my_song);

	return $my_my_song;

}

/**
 * Catches a random line from a given text.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function my_random_line ($text) {
	$text = explode( "\n", $text );
    $text = wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );

	// If the last character of the line is blank, remove it
	$lastchar = substr($text, -1);
	if($lastchar == ' ') {$text = rtrim($text, " ");}

	return $text;
}

/**
 * Deliver a random line from custom text or My Song.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function my_get_anything () {

	// Get Custom Text
	$text = get_option('my_song');

	// If Length=0 > No text is maintained
	$text = strlen($text);

	// Decide which text to take
	$line = ($text > 0) ? my_get_lyric() : my_get_my_song() ;

	return $line;
}

?>