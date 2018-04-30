<?php

// Проверка соответствия пользователя фильтрующему критерию
function match_person(array $userInfo, array $filter): bool {
    return match_gender($userInfo,$filter) && match_age($userInfo,$filter);
}

// Проверка пола
function match_gender(array $userInfo, array $filter): bool {
    return !isset($filter['gender']) || strcasecmp($filter['gender'],$userInfo['sex']) == 0;
}

// Проверка возраста
function match_age(array $userInfo, array $filter): bool {
    return !isset($filter['ageFilter']) || !$filter['ageFilter']
            || intval($filter['lowerAge']) <= intval($userInfo['age'])
            && intval($filter['higherAge']) >= intval($userInfo['age']);
}
?>
