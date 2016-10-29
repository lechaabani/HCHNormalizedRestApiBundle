<?php

/**
 *  Create the errors_code file
 * 
 * @package NormalizedRestApiBundle
 * @subpackage Command
 * @author Hamadi Chaabani <chaabani.hammadi@gmail.com>
 */

namespace HCH\NormalizedRestApiBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *  Create the errors_code file
 * 
 * @package NormalizedRestApiBundle
 * @subpackage Command
 * @author Hamadi Chaabani <chaabani.hammadi@gmail.com>
 */
class CreateErrorCodeCommand extends Command {

  protected function configure() {
    $this
      // the name of the command (the part after "bin/console")
      ->setName('app:create-error-code')

      // the short description shown while running "php bin/console list"
      ->setDescription('Create code error file.')

      // the full command description shown when running the command with
      // the "--help" option
      ->setHelp("This command allows you to create the code error file")
    ;
  }

  protected function execute(InputInterface $input, OutputInterface $output) {

    $content = "; this is an INI file \n [parameters] \n \n ;code 500 \n 501 = An intenal error has occured";
    $fp = fopen(__DIR__ . '../../../../../../../app/config/errors_code.ini', "wb");
    fwrite($fp, $content);
    fclose($fp);
  } 
}
