function setup() {
    const divAsterics = document.getElementById('rating');
    if (divAsterics) {
        divAsterics.addEventListener('click', (e) => {
            const initSpanId = e.target.id;
            const lasChild = divAsterics.lastElementChild;
            const lastChildId = lasChild.id;
            if (initSpanId && +initSpanId > 0 && lastChildId) {
                toggleActive(+initSpanId, +lastChildId);
            }
        });
    }

}

function toggleActive(initSpanId, maxId) {
    for (let i = initSpanId; i >= 0; i--) {
        const span = document.getElementById(i);
        if (span) {
            span.classList.add('active');
        }
    }
    for (let y = initSpanId + 1; y <= maxId +1; y++) {
        const spanAfter = document.getElementById(y);
        if (spanAfter) {
            spanAfter.classList.remove('active');
        }
    }
}

// Example case.
document.body.innerHTML = `
<div id='rating'>
  <span id='0'>*</span>
  <span id='1'>*</span>
  <span id='2'>*</span>
  <span id='3'>*</span>
  <span id='4'>*</span>
</div>`;

setup();

document.getElementsByTagName("span")[2].click();
console.log(document.body.innerHTML);