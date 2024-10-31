//  ver 2.0.0
//  Функция управления GET-параметрами в адресной строке
//      name    = наименование данных из хранилища
//      value   = значение данных из хранилища
//
//  get()                   - получить все GET-параметры из адресной строки в виде JSON. Возвращает JSON-массив.
//  get('name')             - получить значение GET-параметра по наименованию. Возвращает строку (в начале попытается преобразовать все массивоподобные строки в JSON) или undefined, если такого нет.
//  get('name', 'value')    - установить значение GET-параметра по его наименованию (если такого не существует то будет создан) и записывает в адресную строку. Если передать массив, то предварительно конвертирует его в строку. Возвращает true при успехе или false.
//  get('name', null)       - удалить GET-параметр из адресной строки по его имени. Возвращает true при успехе или false.
//  get(null)               - удалить все GET-параметры из адресной строки. Возвращает true при успехе или false.
function get(name = false, value = false) {
    // Формерование текущего URL без GET-параметров
    const url_path = window.location.origin + window.location.pathname;
    // Переменная для записи текущих GET-параметров
    let gets = {};
    // Переменная для формирования GET-параметров для записи в URL
    let gets_line = '';
    // Переменная для записи результата выполнения функции
    let result = false;

    // Формируем все GET-параметры в виде массива
    if(window.location.search !== '') {
        window.location.search.slice(1).split('&').forEach(function(item) {
            const [name, value] = item.split('=');
            
            try {
                gets[name] = JSON.parse(decodeURIComponent(value));
            }
            catch {
                gets[name] = decodeURIComponent(value);
            }
        });
    }

    // Проверка наличия параметров функции
    if(value !== false) {
        // Если 'value' есть то провверка его значения
        if(value !== null) {
            // Если 'value' не 'null', то записываем в хранилище данные
            gets[name] = value;
        }
        else {
            delete gets[name];
        }

        result = true;
    }
    else {
        if(name !== null) {
            result = name !== false ? gets[name] : gets;
        }
        else {
            gets = {};
            result = true;
        }
    }

    if(Object.keys(gets).length > 0) {
        gets = Object.keys(gets).map(function(item) {
            return item +'='+ encodeURIComponent(typeof gets[item] === 'string' ? gets[item] : JSON.stringify(gets[item]));
        });

        gets_line = '?'+ gets.join('&');
    }

    history.pushState(null, null, url_path + gets_line);

    return result;
}