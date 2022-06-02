import { Input } from '../../ui/input/Input';
import { AllFruits } from '../../components/AllFruits/AllFruits'
import { useState } from 'react';
import { Button } from '../../ui/button/Button';
import { ErrorMessage } from '../../ui/errorMessage/ErrorMessage';
import { useEffect } from 'react';
import { getData } from '../../services/api';

export function RandomFruitCont() {
    const RANDOM_URL = 'http://localhost/less_6/api/getRandomFruit.php';

    const [randomCount, setRandomCount] = useState('');
    const [randomData, setRandomData] = useState(null);

    const [inputError, setInputError] = useState(false);
    const [errorMessage, setErrorMessage] = useState('');

    useEffect(() => {
        getData(RANDOM_URL).then((data) => {
            setRandomData(data);
        })
    }, [])


    function handleRandomInput({ target: { value } }) {
        setRandomCount(value);

        if (isNaN(randomCount)) {
            setInputError(true);
            setErrorMessage('*value must be integer only');
        } else {
            setInputError(false);
            setErrorMessage('');
        }
    }

    async function handlerGetRandom() {
        const formData = new FormData();
        formData.append('count', randomCount);

        try {
            const response = await fetch(RANDOM_URL, {
                method: "POST",
                body: formData,
            });

            const randomData = await response.json();
            setRandomData(randomData);
            setInputError(false);
            setErrorMessage('');
            setRandomCount('');
        } catch (error) {
            console.log(error);
        }
    }

    return (<div className='container'>
        <Input
            type={'text'}
            inputPlaceh={'Print random fruit amount...'}
            inputEvent={handleRandomInput}
            style={{ display: 'block', marginTop: '60px' }}
            value={randomCount}
        />

        {inputError && false || <ErrorMessage message={errorMessage} />}

        <Button
            value={'randomize'}
            buttonEvent={handlerGetRandom}
            style={{ marginTop: '30px' }}
        />

        <AllFruits
            data={randomData}
        />
    </div>);
}