<?php
/*
--- Day 2: Inventory Management System ---

You stop falling through time, catch your breath, and check the screen on the device. "Destination reached. Current
Year: 1518. Current Location: North Pole Utility Closet 83N10." You made it! Now, to find those anomalies.

Outside the utility closet, you hear footsteps and a voice. "...I'm not sure either. But now that so many people have
chimneys, maybe he could sneak in that way?" Another voice responds, "Actually, we've been working on a new kind of suit
that would let him fit through tight spaces like that. But, I heard that a few days ago, they lost the prototype fabric,
the design plans, everything! Nobody on the team can even seem to remember important details of the project!"

"Wouldn't they have had enough fabric to fill several boxes in the warehouse? They'd be stored together, so the box IDs
should be similar. Too bad it would take forever to search the warehouse for two similar box IDs..." They walk too far
away to hear any more.

Late at night, you sneak to the warehouse - who knows what kinds of paradoxes you could cause if you were discovered -
and use your fancy wrist device to quickly scan every box and produce a list of the likely candidates (your puzzle
input).

To make sure you didn't miss any, you scan the likely candidate boxes again, counting the number that have an ID
containing exactly two of any letter and then separately counting those with exactly three of any letter. You can
multiply those two counts together to get a rudimentary checksum and compare it to what your device predicts.

For example, if you see the following box IDs:

    abcdef contains no letters that appear exactly two or three times.
    bababc contains two a and three b, so it counts for both.
    abbcde contains two b, but no letter appears exactly three times.
    abcccd contains three c, but no letter appears exactly two times.
    aabcdd contains two a and two d, but it only counts once.
    abcdee contains two e.
    ababab contains three a and three b, but it only counts once.

Of these box IDs, four of them contain a letter which appears exactly twice, and three of them contain a letter which
appears exactly three times. Multiplying these together produces a checksum of 4 * 3 = 12.

What is the checksum for your list of box IDs?
 */

$input = [
    'crruafyzloguvxwctqmphenbkd',
    'srcjafyzlcguvrwctqmphenbkd',
    'srijafyzlogbpxwctgmphenbkd',
    'zrijafyzloguvxrctqmphendkd',
    'srijabyzloguvowcqqmphenbkd',
    'srijafyzsoguvxwctbmpienbkd',
    'srirtfyzlognvxwctqmphenbkd',
    'srijafyzloguvxwctgmphenbmq',
    'senjafyzloguvxectqmphenbkd',
    'srijafyeloguvxwwtqmphembkd',
    'srijafyzlogurxtctqmpkenbkd',
    'srijafyzlkguvxictqhphenbkd',
    'srijafgzlogunxwctqophenbkd',
    'shijabyzloguvxwctqmqhenbkd',
    'srjoafyzloguvxwctqmphenbwd',
    'srijafyhloguvxwmtqmphenkkd',
    'srijadyzlogwvxwctqmphenbed',
    'brijafyzloguvmwctqmphenhkd',
    'smijafyzlhguvxwctqmphjnbkd',
    'sriqafvzloguvxwctqmpheebkd',
    'srijafyzloguvxwisqmpuenbkd',
    'mrijakyuloguvxwctqmphenbkd',
    'srnfafyzloguvxwctqmphgnbkd',
    'srijadyzloguvxwhfqmphenbkd',
    'srijafhzloguvxwctdmlhenbkd',
    'srijafyzloguvxwcsqmphykbkd',
    'srijafyzlogwvxwatqmphhnbkd',
    'srijafyzlozqvxwctqmphenbku',
    'srijafyzloguvxwcbamphenbgd',
    'srijafyzlfguvxwctqmphzybkd',
    'srijafyzloguqxwetqmphenkkd',
    'srijafyylogubxwttqmphenbkd',
    'srijafyzloguvxzctadphenbkd',
    'srijafyzloguoxwhtqmchenbkd',
    'srijafyzloguvxwcvqmzhenbko',
    'srijnfyzloguvxwctqmchenjkd',
    'srijaryzloggvxwctqzphenbkd',
    'srijafhzleguvxwcxqmphenbkd',
    'ssijafyzllguvxfctqmphenbkd',
    'srijafyzloguvxdctqmfhenbcd',
    'srijafyzloguvxfctqmplynbkd',
    'srijaftzlogavxwcrqmphenbkd',
    'sriwaoyzloguvxwctqmphenbtd',
    'srijahyzlogunxwctqmphenbvd',
    'srjjafyzloguzxwctumphenbkd',
    'nrijafyzlxguvxwctqmphanbkd',
    'srijafezlqguyxwctqmphenbkd',
    'srijafygloguvxwjtqcphenbkd',
    'erijafyzloguvxoctqmnhenbkd',
    'ssijafyzllguvxwbtqmphenbkd',
    'sriaafyzloguvxwctqqphenbkv',
    'frijafyzloguvswctwmphenbkd',
    'srijafyzyogkvxwctqmprenbkd',
    'syijafyzuoguvxwctqmkhenbkd',
    'srijafyzloganxwctqmphenbkf',
    'srijafyzloguvxwftqmxhenbkq',
    'srijafyflogxvxwctqmghenbkd',
    'srijafyzsoguvxwctqmpjenwkd',
    'srujafylloguvxwctqmphenckd',
    'srijafyzlpzuvxwctqmphenbud',
    'srijafyzlogfvxwctqmhhenbwd',
    'srijafjzlogusxwctqmphepbkd',
    'srijlfyzloguvxwctqfphenzkd',
    'srijafyzlogwvxwctqyphenbqd',
    'srijafyzloluvxwctqtphenukd',
    'srizafyzlowuvxwctqmphqnbkd',
    'sritafkzlkguvxwctqmphenbkd',
    'sbijafdzloguvxgctqmphenbkd',
    'crijafyeloguvxwctqmpsenbkd',
    'srijafyvlogulxwctqmphenbkk',
    'srijafyologuvxwctqmehegbkd',
    'siijafyzloguvxwctjmphenbmd',
    'srijafyzlupuvxwctqmpheabkd',
    'srijafyzlogumxwctqqphanbkd',
    'srijxfyzlogujxwcqqmphenbkd',
    'irijafizeoguvxwctqmphenbkd',
    'sgijafyzloguvtwctqmpfenbkd',
    'srijzfyzloguvmwctnmphenbkd',
    'srijafyzwohuvxwctqmthenbkd',
    'srijafyzlhguvxoctqwphenbkd',
    'srgjafyplogxvxwctqmphenbkd',
    'srijafyqlogovxwctqzphenbkd',
    'srijafjzloguvlnvtqmphenbkd',
    'srijafyzooguvxwctqmphenvud',
    'srijafyzgoguvxwctumphgnbkd',
    'srijaffzloguvxwdqqmphenbkd',
    'srijafyzlogugxwctqxphenbkr',
    'srijafyzlogutxwctqmmcenbkd',
    'srifafyzlhguwxwctqmphenbkd',
    'mrimajyzloguvxwctqmphenbkd',
    'sriyafyzloguvxwcthmphejbkd',
    'srieakyzlokuvxwctqmphenbkd',
    'srisafyzloguhxwctqmphecbkd',
    'srijanyzloguvxcctqmxhenbkd',
    'srijafyzypguvxwctqmqhenbkd',
    'sryjtfyzlvguvxwctqmphenbkd',
    'srijafyzlsguvxwctqmqfenbkd',
    'srijafyzlogudxwbtqwphenbkd',
    'srijysyzloguvxwctqmpvenbkd',
    'srijafyzloggvxwjtqmphegbkd',
    'srijgfyzloguvxwctqmbhdnbkd',
    'ssijufyzloguvawctqmphenbkd',
    'skojafyzloguvxwctqmphenbnd',
    'srijafylloguvxwcqqmpienbkd',
    'trioafyzloguvqwctqmphenbkd',
    'srijafydloguvxwctqmpzjnbkd',
    'saijafvzloguvxwcqqmphenbkd',
    'srhjapyzloguvxwctqmbhenbkd',
    'srijafyzlfguvxwcsqmpwenbkd',
    'shijafyzboguvxwctqmphenbmd',
    'srizafysloguvxwrtqmphenbkd',
    'srijafyzloguvxwciqmwhenbkj',
    'qrijafyzloduvxwctqmphenbko',
    'srijefyuloguvxwctqmphenbed',
    'srijafyzlobuvxwctqmphenhbd',
    'srijafyzloxuvxwctqmpheabkq',
    'srijafyzloguvrwctqmghenkkd',
    'sfisafywloguvxwctqmphenbkd',
    'srgjafyzlogurxwctqmphenbkp',
    'srijafhzloguvxwcjqmphenhkd',
    'srijafyylogufxwrtqmphenbkd',
    'srijafyzvoguvxwzkqmphenbkd',
    'sqijafyzloguvxwctqmpheqbxd',
    'srijafyvloguvxwctqzpherbkd',
    'srijufyzloguvxlcsqmphenbkd',
    'srijafykloguvxlccqmphenbkd',
    'srijafyzloguexwcrqmphenzkd',
    'sridifyzloguyxwctqmphenbkd',
    'srijafyzlogfvxwctqlphenbkl',
    'srijafyzlodqdxwctqmphenbkd',
    'srijafyzloruvxactqmphenekd',
    'grijafyzloguvxpctmmphenbkd',
    'srsjakyzloguvxwctqmphvnbkd',
    'srikafyvloguvxwrtqmphenbkd',
    'srijafyzloguvxwctqjpserbkd',
    'jrijafyzloguvxwctqmpgesbkd',
    'swijafyzluguvxwctqmfhenbkd',
    'srijanynlogovxwctqmphenbkd',
    'jrijafyzloguvxwctymphrnbkd',
    'srinafyzloguvewctqmphenbzd',
    'srijakyzloguvxwctqmphcnbka',
    'srijafyhlobuvxwctqmphenbka',
    'srijafyzcogusxwctqmphwnbkd',
    'srijavyzlosuvxwctqmphjnbkd',
    'orijafyzxoguvxwcnqmphenbkd',
    'srijafyzlogcvxwvtqmthenbkd',
    'srijapyzloauvxwctqmphenvkd',
    'srijaflzloguhxwctqmphenbwd',
    'smijafyzlonuvxwctqmphenbkw',
    'jrijafyzloguvxwclqmnhenbkd',
    'srijaqyzloguvqwctqmphenskd',
    'srijasyzloguvxwctqmvhenbku',
    'crijtfyzloguvxwctqmthenbkd',
    'srrkafyzvoguvxwctqmphenbkd',
    'srijatyzloguvewctqmphenbld',
    'srfjafyyloguvnwctqmphenbkd',
    'srijafyzloguvxwctqjpbenbkt',
    'hrijafyzooguvxwctqmphenbld',
    'srijafbzlogscxwctqmphenbkd',
    'srinafyzlogxvxwctqqphenbkd',
    'slijafyzloglvxwctqmphenbdd',
    'srijafyzlogjvxwcsqmphenbld',
    'sryjcfyzloguvewctqmphenbkd',
    'srijafyzloguexwctqmohknbkd',
    'jaijafyzlogevxwctqmphenbkd',
    'srijafbzlogavxwctqmphenbki',
    'srijafozlogpvxwctqmphgnbkd',
    'srijdfyzloguvxwczqmphenbkm',
    'srijafyzlobuvxwctqmphxndkd',
    'mrijifyzlhguvxwctqmphenbkd',
    'srijafyzloguvxbctumphjnbkd',
    'srijafyzloyuvxwptqmphlnbkd',
    'arijafyzloguvxwcsqmohenbkd',
    'srijaftzioguvxwttqmphenbkd',
    'srijafyzlqsuvxwctqmphxnbkd',
    'srijafyzioguvxwctqnphetbkd',
    'prijafbzloguvxdctqmphenbkd',
    'srijaeyzlnguvxwmtqmphenbkd',
    'srijofyzloguvqwctqmphonbkd',
    'srixaryzpoguvxwctqmphenbkd',
    'srijafyzlowuvxwcwhmphenbkd',
    'srijafydloguvxwctqmptenikd',
    'srijqfyzlogtvfwctqmphenbkd',
    'srijafyzloguvxlctqmpvenbgd',
    'srijafyzlbguvxwjtqgphenbkd',
    'srijafyzlohuqxwctqmphenbka',
    'srijafyzroguvxictqmphynbkd',
    'srijafyzloguvxdctjmphenjkd',
    'srijaoczloguvxwctqmphenbjd',
    'srajafhzloguvxwctqmphenbke',
    'srijofyzloduvxwctqmphanbkd',
    'srijafytloguvxwmtnmphenbkd',
    'srijafyzuoguvxwceqmpgenbkd',
    'rrijafyzloyuvxwctqmphlnbkd',
    'srljafyzloguvxictqmohenbkd',
    'srijafyzlogulxwcrqrphenbkd',
    'srajafyzloguvxwctqmphanbke',
    'srijafyzlhguvxwxtqmpheabkd',
    'sxijafyzloggwxwctqmphenbkd',
    'srijafyultguvxwctqmphinbkd',
    'srijafyzloguvtwctqmfhvnbkd',
    'srijafwzloruvxwctquphenbkd',
    'srbjafyzxoguuxwctqmphenbkd',
    'erijafyzlxguvxbctqmphenbkd',
    'srijagyzlojubxwctqmphenbkd',
    'srijafyzloguvxwdtqmchenakd',
    'srijafkzlogukxwctqiphenbkd',
    'mridafyzloguvxwctqmphenrkd',
    'szqjafyzloguvxwctqmpheibkd',
    'srijahyzloguvxwctcmphenekd',
    'srijafyzloguvxwczpuphenbkd',
    'srijafyzcoguvfwctqmphenbkq',
    'qriiafyzloguvxwctqmpheebkd',
    'srijpfyzloguvxlctqmphenokd',
    'srijzfyzlotuvxwcjqmphenbkd',
    'srinafyqloguvxwctfmphenbkd',
    'srijafyzlogjvxpltqmphenbkd',
    'srijafyzlotuvxwutqmphenbtd',
    'sridafyzloguvxwctqmpyenokd',
    'srxjafyzqogyvxwctqmphenbkd',
    'ssijafyzzoguvxwctqmphenbad',
    'srijafrzloguvxwctqmphekpkd',
    'srijafyzlfgrvxactqmphenbkd',
    'srijafyzroguvxwttqmphekbkd',
    'srijefyzloguvxwctqmpqenbrd',
    'srijefycloguvxwctqmchenbkd',
    'srzjafyzloguvxwcqqmphanbkd',
    'srijauyzlhguvxwctqmphenbgd',
    'srijafyzloguvmwvnqmphenbkd',
    'srihafyzloguvlwotqmphenbkd',
    'srigafyzloguvxwctqmphennsd',
    'sriuafzzloguvxwcuqmphenbkd',
    'srijavuzllguvxwctqmphenbkd',
    'srijafjzloguvlnctqmphenbkd',
    'lrirafyzloguvxwctqmphenbld',
    'soijarxzloguvxwctqmphenbkd',
    'srijapyzlnguvxwctqmdhenbkd',
    'srijafyzkogujxmctqmphenbkd',
    'srijafuzloguvxwcsqvphenbkd',
    'srijagyzzoguvxwctqmpvenbkd',
    'srijafyzlovuvxwctqmrhenbxd',
    'srijafyzqoguvxwctwmpienbkd',
    'sxijafyzloguvxwutqmphenlkd',
    'srijafyzlhgzvxwctqmphqnbkd',
    'srijajyzloguvxwcbwmphenbkd',
    'srijazyzloguvxwhtqmphenbkx',
    'srgjafyzloguvvwctqmphdnbkd',
    'rrivafyzloguvxjctqmphenbkd',
    'srijifyzdoguvxwctqmphenbka',
    'hrijafyzloguvxectqmpheybkd',
];

$twoMatchingLetters = 0;
$threeMatchingLetters = 0;

foreach ($input as $boxId) {
    $letters = str_split($boxId);
    sort($letters);

    $matches = [];

    foreach ($letters as $letter) {
        if (!array_key_exists($letter, $matches)) {
            $matches[$letter] = 0;
        }

        $matches[$letter]++;
    }

    $twoMatchFound = false;
    $threeMatchFound = false;

    foreach ($matches as $letter => $amount) {
        if (!$twoMatchFound && $amount === 2) {
            $twoMatchFound = true;
            $twoMatchingLetters++;
        }

        if (!$threeMatchFound && $amount === 3) {
            $threeMatchFound = true;
            $threeMatchingLetters++;
        }

        if ($twoMatchFound && $threeMatchFound) {
            break;
        }
    }
}

echo 'Part 1 Answer: ' . $twoMatchingLetters * $threeMatchingLetters . "\n";

/*
--- Day 2: Inventory Management System ---

--- Part Two ---

Confident that your list of box IDs is complete, you're ready to find the boxes full of prototype fabric.

The boxes will have IDs which differ by exactly one character at the same position in both strings. For example, given
the following box IDs:

abcde
fghij
klmno
pqrst
fguij
axcye
wvxyz

The IDs abcde and axcye are close, but they differ by two characters (the second and fourth). However, the IDs fghij and
fguij differ by exactly one character, the third (h and u). Those must be the correct boxes.

What letters are common between the two correct box IDs? (In the example above, this is found by removing the differing
character from either ID, producing fgij.)
 */

$commonLetters = '';
$maximum = count($input);
$maximumLetters = strlen($input[0]);

$differenceIndex = 0;

foreach ($input as $index => $boxId) {
    $letters = str_split($boxId);

    for ($i = $index + 1; $i < $maximum; $i++) {
        $otherLetters = str_split($input[$i]);

        $differences = 0;
        foreach ($letters as $letterIndex => $letter) {
            if ($otherLetters[$letterIndex] !== $letter) {
                $differences++;
                $differenceIndex = $letterIndex;
            }

            if ($differences > 1) {
                break;
            }
        }

        if ($differences === 1) {
            unset($letters[$differenceIndex]);
            $commonLetters = implode('', $letters);

            break 2;
        }
    }
}

echo 'Part 2 Answer: ' . $commonLetters . "\n";
