<?php

namespace Model;
require_once dirname($_SERVER['SCRIPT_FILENAME']) . '/Controller/ArrayBuilder.php';
use Controller\ArrayBuilder;
class Set {
    public $content;

    // TODO: Create a SetBuilder and remove the ArrayBuilder call of the constructor.
    public function __construct(int $quantity, array $content) {
        $this->content = $content;
        $this->size = count($this->content);
    }

    public function intersect(Set $set): array {
        $otherSetContent = $set->getContent();
        $intersectionItems = [];

        foreach ($otherSetContent as $item) {
            if (in_array($item, $this->content) && !in_array($item, $intersectionItems)) {
                $intersectionItems[] = $item;
            }
        }

        return $intersectionItems;
    }

    public function join(Set $set): array {
        $otherSetContent = $set->getContent();
        $unionItems = [];

        foreach ($otherSetContent as $item) {
            if (!in_array($item, $this->content) && !in_array($item, $unionItems)) {
                $unionItems[] = $item;
            }
        }

        return $unionItems;
    }

    public function getContent(): array {
        return $this->content;
    }

    public function getSize(): int {
        return $this->size;
    }

    public function setContent(array $content) {
        $this->content = $content;
    }
}