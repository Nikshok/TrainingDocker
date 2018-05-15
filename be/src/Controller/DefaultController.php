<?php

namespace App\Controller;

use App\Entity\ForumTopic;
use App\Repository\ForumTopicRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @param ForumTopicRepository $forumTopicRepository
     * @return Response
     * @Route("/index")
     */
    public function index(ForumTopicRepository $forumTopicRepository)
    {
        $forumTopics = $forumTopicRepository->findAll();

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $serializer = new Serializer(array($normalizer), array($encoder));

        $callback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        $normalizer->setCallbacks(array('created' => $callback));

        foreach ($forumTopics as $key => $forumTopic) {

            $jsonContent = $serializer->serialize($forumTopic, 'json');

            $curl = curl_init();

            $url = 'elastic:9200/forum2/topic/' . $forumTopic->getId();

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonContent);

            curl_exec($curl);
            curl_close($curl);

        }

        return new Response('');
    }

    /**
     * @return Response
     * @Route("/test")
     */
    public function test()
    {
        $curl = curl_init();

        $url = 'elastic:9200/forum/topic/50/_source';

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);

        $result = curl_exec($curl);
//        var_dump($result);
        curl_close($curl);

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $serializer = new Serializer(array($normalizer, new DateTimeNormalizer()), array($encoder));

        $callback = function ($dateTime) {
            return new \DateTime($dateTime);
        };

        $normalizer->setCallbacks(array('created' => $callback));
        $result = $serializer->deserialize($result, ForumTopic::class, 'json');
var_dump($result);
        return new Response();
    }

    /**
     * @return Response
     * @Route("/test2")
     */
    public function test2(ForumTopicRepository $forumTopicRepository)
    {

        $topic = $forumTopicRepository->find(30);

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();
//        $normalizer->setIgnoredAttributes(array('id', 'title', 'section'));


        $serializer = new Serializer(array(new DateTimeNormalizer(), $normalizer), array($encoder));

        $result = $serializer->serialize($topic, 'json');
        var_dump($result);

        $result2 = $serializer->deserialize($result, ForumTopic::class, 'json');
        var_dump($result2);
        return new Response();
    }

    /**
     * @return Response
     * @Route("/test3")
     */
    public function test3()
    {

        $date = new \DateTime();

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $serializer = new Serializer(array(new DateTimeNormalizer(), $normalizer), array($encoder));


        $result = $serializer->serialize($date, 'json');
        var_dump($result);

        $result = $serializer->deserialize($result, \DateTime::class, 'json');
        var_dump($result);
        return new Response();
    }
}