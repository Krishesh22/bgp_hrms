app.filter('startsWith', () => {
    return (items, prefixes, itemProperty) => {
        if (items && items.length) {
            return items.filter((item) => {
                var findIn = itemProperty ? item[itemProperty] : item;

                for (let i = 0; i < prefixes.length; i++) {
                    if (findIn.toString().indexOf(prefixes[i]) === 0) {
                        return true;
                    }
                }
            });
        }
    };
});