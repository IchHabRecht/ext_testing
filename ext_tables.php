<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Testing');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_exttesting_domain_model_blog', 'EXT:ext_testing/Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_blog.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_exttesting_domain_model_blog');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_exttesting_domain_model_post', 'EXT:ext_testing/Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_post.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_exttesting_domain_model_post');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_exttesting_domain_model_comment', 'EXT:ext_testing/Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_comment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_exttesting_domain_model_comment');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_exttesting_domain_model_author', 'EXT:ext_testing/Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_author.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_exttesting_domain_model_author');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_exttesting_domain_model_tag', 'EXT:ext_testing/Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_tag.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_exttesting_domain_model_tag');
