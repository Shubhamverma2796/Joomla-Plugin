document.addEventListener('DOMContentLoaded', () => {
        var allheadings = document.querySelectorAll("h1,h2,h3,h4,h5,h6");
        allheadings = [...allheadings]
        let prelevel = 0;
        allheadings.forEach((el, i) => {
            let currentLevel = +el.tagName.slice(1);
            //if the current heading is h1, then check for next headings otherwise replace the first heading with h1 heading because h1 shoulb be at top.
            if (currentLevel === 1) {
                prelevel = 1;
                return;
            }
            else if (currentLevel - prelevel > 1) {
                var x = document.createElement(`h${prelevel + 1}`);
                var y = document.createTextNode(el.innerHTML);
                x.appendChild(y);
                el.replaceWith(x);
                prelevel++;
            }
            else if (prelevel > currentLevel) {
                prelevel = currentLevel;
            }
            else if (currentLevel - prelevel === 1) {
                prelevel++;
            }
        })
});