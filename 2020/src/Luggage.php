<?php

namespace adventofcode\Year2020;

use Exception;

class Luggage
{
    /**
     * Given a list of rules, find which ones can contain the specified bag type.
     *
     * @param array $rules
     * @param string $bagType
     * @return int
     */
    public function canContainBagType(array $rules, string $bagType): int
    {
        $nodes = [];
        $visited = [];

        foreach ($rules as $rule) {
            list($bag, $contains) = explode(' contain ', trim($rule, '.'));
            $bag = str_replace(' bags', ' bag', $bag);

            if (!array_key_exists($bag, $nodes)) {
                $nodes[$bag] = [];
            }

            $holdsBags = (strpos($contains, 'no other') === false);
            if ($holdsBags) {
                $heldBags = explode(', ', str_replace(' bags', ' bag', $contains));
                foreach ($heldBags as $heldBag) {
                    preg_match('/(\d+) (.*)/', $heldBag, $matches);
                    $amount = $matches[1];
                    $type = $matches[2];

                    if ($amount > 1) {
                        $type = rtrim($type, 's');
                    }

                    if (!array_key_exists($type, $nodes[$bag])) {
                        $nodes[$bag][$type] = 0;
                    }

                    $nodes[$bag][$type] = $amount;
                }
            }
        }

        // TODO: Figure out how to flag things as visited. I think my flaw is I could walk one path but not come back
        // and catch the alternate path leading to desired bag.
        $walkGraph = function ($edges, $path) use ($bagType, $nodes, &$walkGraph) {
//            $result = false;
            foreach ($edges as $name => $amount) {
                $path[] = $name;
                if ($name === $bagType) {
                    return $path;
//                    return true;
                }
//
//                $result = $walkGraph($nodes[$name]);
                $path = $walkGraph($nodes[$name], $path);
            }
//            return $result;

            return $path;
        };

        foreach ($nodes as $bagName => $edges) {
            if ($bagName !== $bagType) {
                $path = $walkGraph($edges, [$bagName]);
//                print_r($path);
                if (in_array($bagType, $path)) {
                    $visited = array_merge($visited, $path);
                }
            }

//            if ($walkGraph($edges, [$bagName])) {
//                $visited[] = $bagName;
//            }
        }

        $visited = array_unique($visited);
//        print_r($nodes);
//        print_r($visited);

        // The shiny gold bag is included in the visited nodes. Don't count that.
        return count($visited) - 1;
    }
}
