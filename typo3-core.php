<?php
// configuration for TYPO3 core

$gitRoot = '/www/shared/TYPO3core/';
$gitRootIsWorkingCopy = TRUE;
$htmlFile = 'core.html';

$reviewLinkPattern = "https://review.typo3.org/#/q/tr:%s,n,z";

$issueMapping = array(
	'#M17868' => '#25258',
	'#M17924' => '#25305',
	'#M18051' => '#25406',
	'#M17916' => '#25301',
	'#24440' => '#23355',
	'#24410' => '#23355',
	'#23496' => '#23355',
	'#23860' => '#23355',
	'#25006' => '#33853',
);

// list of issues to be ignored as TODOs from a certain branch. Used to
// shorten the list of issues that are marked "TODO" if e.g. the originally
// advertised backport (in the commit message on the master branch) will
// not be needed or is not possible to be back-ported.
// This is similar to an "ABANDONED"-state, but not for a changeset, but
// instead for a whole issue+branch combination.
$ignoreList = array(
	'TYPO3_4-5' => array(
		'28594' => 'Backporting to 4.5 not needed, see comment in Gerrit.',
		'28616' => 'Backporting to 4.5 not desired, see comment in Gerrit.',
		'30311' => 'IDNA converter is not in 4.5, adding would count as feature, will not be backported, see comment in Gerrit',
		'30311' => 'IDNA converter is not in 4.5, adding would count as feature, will not be backported, see comment in Gerrit',
		'31943' => 'Seems to not apply on 4.5, see comment in Gerrit.',
		'32938' => 'Does not apply to 4.5, see comment in Gerrit.',
		'34012' => 'Slider was introduced with 4.6 so this does not apply for 4.5, see comment in Gerrit',
		'35296' => 'Affects tx_form which was introduced in 4.6, does not apply to 4.5, see comment in Gerrit',
		'36937' => 'Does not apply to 4.5, see comment in Gerrit.',
	),
	'TYPO3_4-6' => array(
		'36937' => 'Does not apply to 4.6, see comment in Gerrit.',
	),
);

$projectsToCheck = array(
	'TYPO3 CMS Core' => array(
		'gitWebUrl' => 'http://git.typo3.org/TYPO3v4/Core.git',
		'releases' => array(
				# project, starting point, branch, working copy path
			#	array('4.2', 'refs/tags/TYPO3_4-2-0', 'origin/TYPO3_4-2', 'TYPO3_4-2'),
			#	array('4.3', 'refs/tags/TYPO3_4-3-0', 'origin/TYPO3_4-3', 'TYPO3_4-3'),
				array('4.4', 'refs/tags/TYPO3_4-4-0', 'origin/TYPO3_4-4', 'TYPO3_4-4'),
				array('4.5', 'refs/tags/TYPO3_4-5-0', 'origin/TYPO3_4-5', 'TYPO3_4-5'),
			#	array('4.5-BP', 'refs/tags/TYPO3_4-5-0', 'backports/TYPO3_4-5', 'TYPO3_4-5_backports'),
				array('4.6', 'refs/tags/TYPO3_4-5-0', 'origin/TYPO3_4-6', 'TYPO3_4-6'),
			#	array('4.6-BP', 'refs/tags/TYPO3_4-5-0', 'backports/TYPO3_4-6', 'TYPO3_4-6_backports'),
				array('4.7', 'refs/tags/TYPO3_4-5-0', 'origin/TYPO3_4-7', 'TYPO3_4-7'),
				array('6.0', 'refs/tags/TYPO3_4-5-0', 'origin/master', 'TYPO3_6-0'),
		),
	),
);

/**
 * Callback to detect if this commit is a "release" commit
 *
 * @param $commitInfos array The infos from the commit
 * @return mixed FALSE|string The released version name
 */
function getDetectedReleaseCommitCallback($commitInfos) {
	if (preg_match('/Release of TYPO3 (.*)/', $commitInfos['subject'], $matches)) {
		return $matches[1];
	}
	return NULL;
}


?>
