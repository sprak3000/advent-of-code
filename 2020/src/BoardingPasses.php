<?php

namespace adventofcode\Year2020;

use Exception;

class BoardingPasses
{
    /**
     * Given a boarding pass, return an array containing the row, column and seat ID for the pass.
     * @param string $pass
     * @return array
     */
    public function computeSeatData(string $pass): array
    {
        $row = 0;
        $column = 0;

        $rowData = str_split(substr($pass, 0, 7));
        $columnData = str_split(substr($pass, 7, 3));

        $lower = 0;
        $upper = 127;

        foreach ($rowData as $index => $data) {
            switch ($data) {
                case 'F':
                    $upper -= intval(ceil(($upper - $lower) / 2));
                    if ($index === array_key_last($rowData)) {
                        $row = $upper;
                    }
                    break;
                case 'B':
                    $lower += intval(ceil(($upper - $lower) / 2));
                    if ($index === array_key_last($rowData)) {
                        $row = $lower;
                    }
                    break;
            }
        }

        $lower = 0;
        $upper = 7;

        foreach ($columnData as $index => $data) {
            switch ($data) {
                case 'L':
                    $upper -= intval(ceil(($upper - $lower) / 2));
                    if ($index === array_key_last($columnData)) {
                        $column = $upper;
                    }
                    break;
                case 'R':
                    $lower += intval(ceil(($upper - $lower) / 2));
                    if ($index === array_key_last($columnData)) {
                        $column = $lower;
                    }
                    break;
            }
        }

        return [
            'row' => $row,
            'column' => $column,
            'id' => ($row * 8) + $column,
        ];
    }

    /**
     * Given an array of boarding pass data, return the highest seat ID found.
     *
     * @param array $passes
     * @return int
     */
    public function findHighestSeatID(array $passes): int
    {
        $highestID = 0;

        foreach ($passes as $pass) {
            $data = $this->computeSeatData($pass);

            if ($data['id'] > $highestID) {
                $highestID = $data['id'];
            }
        }

        return $highestID;
    }

    /**
     * Given an array of boarding pass data, return my seat ID.
     *
     * @param array $passes
     * @return int
     */
    public function findMySeat(array $passes): int
    {
        $myID = 0;
        $ids = [];

        foreach ($passes as $pass) {
            $data = $this->computeSeatData($pass);
            $ids[] = $data['id'];
        }

        sort($ids);

        $previous = $ids[0];
        foreach ($ids as $id) {
            if ($id - $previous > 1) {
                $myID = $id - 1;
                break;
            }

            $previous = $id;
        }

        return $myID;
    }
}
