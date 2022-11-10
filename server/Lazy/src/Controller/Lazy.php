<?php

declare(strict_types=1);
/**
 * This file is part of gcode.
 *
 * @author   phpsarc
 * @link     https://github.com/PHP2C/gcode
 * @email    phpsarc@gmail.com
 */
namespace Gcode\Server\Lazy\Controller;

use App\Controller\AbstractController;
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Posseg;
use Gcode\Server\Lazy\Model\Book;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\Utils\Codec\Json;

#[Controller]
class Lazy extends AbstractController
{
    #[Inject]
    protected Book $book;

    public function __construct()
    {
        ini_set('memory_limit', '1024M');
        Jieba::init();
        Finalseg::init();
        Posseg::init();
    }

    #[GetMapping('/lazy')]
    public function setWords(): \Psr\Http\Message\ResponseInterface
    {
        $book = 'ThreeKingdoms';
        $fileName = BASE_PATH . "/public/book/{$book}.txt";
        if (! file_exists($fileName)) {
            throw new \Exception('file not exist');
        }
        $file = file_get_contents($fileName);

        if (! $file) {
            throw new \Exception('get file contents fail');
        }

        $data = Posseg::cut($file);
        $temp = [];
        foreach ($data as $k => $v) {
            if ($v['tag'] != 'n') {
                unset($data[$k]);
                continue;
            }
            $temp[] = $v['word'];
        }
        $temp = array_unique($temp);
        $data = Json::encode($temp);

        $data = $this->book->createOne(['book' => $book, 'content' => $data]);

        return self::resp([$data]);
    }

    #[GetMapping('getw')]
    public function getWords(): \Psr\Http\Message\ResponseInterface
    {
        $book = 'ThreeKingdoms';
        $data = $this->book->getByWhere([
            ['book', '=', $book],
        ]);
        $data = reset($data);
        $data = Json::Decode($data['content']);
        $i = 2;
        $str = [];
        while ($i != 0) {
            $id = mt_rand(1, count($data));

            if (! array_key_exists($id, $data)) {
                continue;
            }
            $str[] = $data[$id];
            --$i;
        }
        $str = reset($str) . '的' . end($str);
        return self::resp($str);
    }
}
