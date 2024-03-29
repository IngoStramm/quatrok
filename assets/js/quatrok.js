document.addEventListener('DOMContentLoaded', function () {

    // Calculadora

    const toggleBtns = document.querySelectorAll('.qk-calc-rendimento-btn-toggle');
    const inputs = document.querySelectorAll('.qk-calc-rendimento-input');
    const qkCalcTypeInput = document.getElementById('qk-calc-type');

    function isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(parseFloat(n)) && parseFloat(n) !== 0;
    }

    function calc() {
        const tipo = document.getElementById('qk-calc-type').value;
        const largura = document.getElementById('largura').value;
        const gramatura = document.getElementById('gramatura').value;
        const resCalc = document.getElementById('res-calc');
        const resultWrapper = document.getElementById('qk-calc-rendimento-resultado');

        if (!isNumeric(largura) || !isNumeric(gramatura)) {
            resultWrapper.style.display = 'none';
            resCalc.innerText = '';
            return;
        }

        let resultValue = 0;

        if (tipo === 'ramada') {
            /*
            Largura x Gramatura = Y
            1000 / Y = RESULTADO
            */
            resultValue = 1000 / (largura * gramatura);
        } else {
            /*
            Largura x Gramatura = Y
            1000 / Y = X
            X / 2 = RESULTADO FINAL
            */
            const x = 1000 / (largura * gramatura);
            resultValue = x / 2;
        }
        resCalc.innerText = resultValue.toFixed(2);
        resultWrapper.style.display = 'block';
    }

    function toggleBtnsFunction(toggleBtn) {
        toggleBtn.addEventListener('click', e => {
            e.preventDefault();
            const id = e.target.dataset.id;
            const activeBtns = document.querySelectorAll('.qk-calc-rendimento-btn-toggle.active');
            for (const activeBtn of activeBtns) {
                activeBtn.classList.remove('active');
            }
            e.target.classList.add('active');
            qkCalcTypeInput.value = id;
            calc();
        });
    }

    function keypInputFunction(input) {
        input.addEventListener('keyup', e => {
            calc();
        });
    }

    for (const toggleBtn of toggleBtns) {
        toggleBtnsFunction(toggleBtn);
    }

    for (const input of inputs) {
        keypInputFunction(input);
    }

    // Telefones

    function qk_random_phone() {
        const telefones = ajax_object.telefones;
        let novoNumero;
        // console.log(telefones.length);
        if (telefones.length <= 1) {
            // console.log(1);
            novoNumero = telefones;
        }
        const min = 0;
        const max = telefones.length - 1;
        novoNumero = Math.floor(Math.random() * (max - min + 1) + min);
        // console.log(telefones[novoNumero]);
        const qkRandomPhoneSpans = document.querySelectorAll('.qk-random-phone');
        for (const span of qkRandomPhoneSpans) {
            span.innerText = telefones[novoNumero];
        }
    }

    qk_random_phone();

});