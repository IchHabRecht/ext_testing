<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ext_testing".
 *
 * Auto generated 04-09-2016 15:14
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Testing',
  'description' => 'This extension provides real examples for unit and functional tests',
  'category' => 'example',
  'author' => 'Nicole Cordes',
  'author_email' => 'typo3@cordes.co',
  'state' => 'stable',
  'uploadfolder' => '1',
  'createDirs' => '',
  'clearCacheOnLoad' => 0,
  'version' => '0.2.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '7.6.0-7.6.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  '_md5_values_when_last_written' => 'a:38:{s:9:"ChangeLog";s:4:"fd8a";s:21:"ExtensionBuilder.json";s:4:"8a89";s:13:"composer.json";s:4:"2a85";s:12:"ext_icon.gif";s:4:"e922";s:14:"ext_tables.php";s:4:"031f";s:14:"ext_tables.sql";s:4:"e08c";s:37:"Classes/Controller/BlogController.php";s:4:"a184";s:31:"Classes/Domain/Model/Author.php";s:4:"e69b";s:29:"Classes/Domain/Model/Blog.php";s:4:"9c08";s:32:"Classes/Domain/Model/Comment.php";s:4:"2bea";s:29:"Classes/Domain/Model/Post.php";s:4:"8e43";s:28:"Classes/Domain/Model/Tag.php";s:4:"6007";s:44:"Classes/Domain/Repository/BlogRepository.php";s:4:"d9e2";s:52:"Classes/Validation/Validator/DateBeforeValidator.php";s:4:"0951";s:44:"Configuration/ExtensionBuilder/settings.yaml";s:4:"4f3e";s:55:"Configuration/TCA/tx_exttesting_domain_model_author.php";s:4:"425c";s:53:"Configuration/TCA/tx_exttesting_domain_model_blog.php";s:4:"fa19";s:56:"Configuration/TCA/tx_exttesting_domain_model_comment.php";s:4:"d5d6";s:53:"Configuration/TCA/tx_exttesting_domain_model_post.php";s:4:"197b";s:52:"Configuration/TCA/tx_exttesting_domain_model_tag.php";s:4:"8a73";s:40:"Resources/Private/Language/locallang.xlf";s:4:"a190";s:78:"Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_author.xlf";s:4:"ef01";s:76:"Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_blog.xlf";s:4:"23bf";s:79:"Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_comment.xlf";s:4:"cf26";s:76:"Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_post.xlf";s:4:"9b67";s:75:"Resources/Private/Language/locallang_csh_tx_exttesting_domain_model_tag.xlf";s:4:"cd59";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"a190";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:60:"Resources/Public/Icons/tx_exttesting_domain_model_author.gif";s:4:"1103";s:58:"Resources/Public/Icons/tx_exttesting_domain_model_blog.gif";s:4:"905a";s:61:"Resources/Public/Icons/tx_exttesting_domain_model_comment.gif";s:4:"1103";s:58:"Resources/Public/Icons/tx_exttesting_domain_model_post.gif";s:4:"1103";s:57:"Resources/Public/Icons/tx_exttesting_domain_model_tag.gif";s:4:"4e5b";s:50:"Tests/Functional/Controller/BlogControllerTest.php";s:4:"8d3b";s:57:"Tests/Functional/Domain/Repository/BlogRepositoryTest.php";s:4:"fe3f";s:61:"Tests/Functional/Fixtures/tx_exttesting_domain_model_blog.xml";s:4:"c991";s:44:"Tests/Unit/Controller/BlogControllerTest.php";s:4:"7579";s:59:"Tests/Unit/Validation/Validator/DateBeforeValidatorTest.php";s:4:"3459";}',
);

