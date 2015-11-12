# Human-friendly password generator

Generates password from 2 parts: first is random, but well-readable string, seocnd is a word from dictionary.

All options are in config file:
 
 - random_uppercase: make several letters uppercase [true/false]
 - uppercase_chance: chance to make letter uppercase. Applies for each letter. [0-9]
 - add_numbers: add or not numbers to password (to the end of both parts). [true/false]
 - number_chance: chance to add number [0-9]
 - words => [] : dictionary.





### Usage examples:

Code:
```
for( $i=0; $i<10; $i++ ) {
      echo \Passworder::gen()."<br>";
  }
```

Config:
```
    'random_uppercase' => true,
    'uppercase_chance' => 1,        # 0-9
    'add_numbers' => true,
    'number_chance' => 5,           # 0-9
    'delimeters'  => '-_!@%.#',
```

Output:
```
sobmu.heat
Rupke4.print
bistO2-doubt
penga#agree
TambU8#papeR6
RamdA!woman
tebPU-sleep
dogke.wOuNd4
Todki!linen
nanrO.WoRk6
```
