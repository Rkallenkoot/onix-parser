<?php

namespace Ribal\Onix;

use Ribal\Onix\Message\Message;
use Ribal\Onix\Normalizer\CodeListNormalizer;
use Ribal\Onix\Normalizer\DateNormalizer;
use Ribal\Onix\Normalizer\ShortTagNameConverter;
use Ribal\Onix\Normalizer\TextNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Parser
{

    /**
     * XML Encoder
     *
     * @var XmlEncoder
     */
    private $encoder;

    /**
     * Array of normalizers to use
     *
     * @var array
     */
    private $normalizers = [];

    /**
     * Serializer service
     *
     * @var Serializer;
     */
    private $serializer;

    /**
     * Constructor function
     * 
     * Initializes the needed libraries and classes to work with
     * 
     * @param string $language
     * @return Parser
     */
    public function __construct(string $language = 'en')
    {

		$supportedLanguages = ['en', 'es', 'de', 'fr', 'it', 'nb', 'tr'];
		
    	if (!in_array($language, $supportedLanguages)) {
    		throw new \InvalidArgumentException('Language must be one of ' . join(', ', $supportedLanguages));
    	}
    
        $this->encoder = new ONIXEncoder();

        $this->normalizers = [
            new ArrayDenormalizer(),
            new CodeListNormalizer($language),
            new DateNormalizer(),
            new TextNormalizer(),
            new ObjectNormalizer(
                null,
                new ShortTagNameConverter(),
                null,
                new ReflectionExtractor()
            )
        ];

        $this->serializer = new Serializer(
            $this->normalizers,
            [ $this->encoder ]
        );
    }

    /**
     * Parse an XML string
     *
     * @param string $xml
     * @return Message
     */
    public function parseString(string $xml)
    {
        $message = $this->serializer->deserialize($xml, Message::class, 'xml', [
            // XmlEncoder::DECODER_IGNORED_NODE_TYPES => [XML_TEXT_NODE],
        ]);

// dd($this->serializer->serialize($message, 'xml', [
//     XmlEncoder::ROOT_NODE_NAME => 'ONIXmessage',
//     XmlEncoder::REMOVE_EMPTY_TAGS => true,
//     XmlEncoder::FORMAT_OUTPUT => true
// ]));

        return $message;
    }

    public function writeObject(Message $message)
    {
        $rootNode = [
          '@xmlns' => 'http://ns.editeur.org/onix/3.0/reference',
          '@release' => '3.0',
          '#' => $message
        ];

        $message = $this->serializer->serialize($rootNode, 'xml', [
            ObjectNormalizer::SKIP_NULL_VALUES => true,
            ObjectNormalizer::PRESERVE_EMPTY_OBJECTS => true,
            'xml_root_node_name' => 'ONIXMessage'
        ]);

        return $message;
    }


}
