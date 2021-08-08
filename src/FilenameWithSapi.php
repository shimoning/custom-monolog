<?php

namespace Shimoning\CustomMonolog;

use Psr\Log\LoggerInterface;
use Monolog\Handler\RotatingFileHandler;

/**
 * ログファイル名にPHP実行ユーザ名を付与する
 */
class FilenameWithSapi
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Psr\Log\LoggerInterface $logger
     * @return void
     */
    public function __invoke(LoggerInterface $logger)
    {
        $sapi = php_sapi_name();
        if ($sapi === false) {
            return;
        }

        foreach ($logger->getHandlers() as $handler) {
            if ($handler instanceof RotatingFileHandler) {
                $handler->setFilenameFormat(
                    "{filename}-$sapi-{date}",
                    RotatingFileHandler::FILE_PER_DAY
                );
            }
        }
    }
}
