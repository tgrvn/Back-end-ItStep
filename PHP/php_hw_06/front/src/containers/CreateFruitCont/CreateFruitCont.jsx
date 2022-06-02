import { useState } from 'react';
import { Button } from '../../ui/button/Button';
import { Input } from '../../ui/input/Input';
import { ErrorMessage } from '../../ui/errorMessage/ErrorMessage'


export function CreateFruitCont() {
    const CREATE_URL = 'http://localhost/less_6/api/createFruit.php';

    const [frName, setFrName] = useState("");
    const [frType, setFrType] = useState("");
    const [frCount, setFrCount] = useState("");
    const [frPrice, setFrPrice] = useState("");

    const [errorMessage, setErrorMessage] = useState("");
    const [errorFlag, setErrorFlag] = useState(false);

    async function handlerCreateFruit() {
        if (isNaN(frName) && isNaN(frType) && !isNaN(frCount) && !isNaN(frPrice)) {
            setErrorMessage('');
            setErrorFlag(false);

            const formData = new FormData();
            formData.append('name', frName);
            formData.append('type', frType);
            formData.append('count', frCount);
            formData.append('price', frPrice);

            try {
                const request = await fetch(CREATE_URL, {
                    method: "POST",
                    body: formData
                });

                const response = await request.json();
            } catch (error) {
                console.log(error);
            }

        } else {
            setErrorMessage('*type n name must be a letter, count n price must be a integer');
            setErrorFlag(true);
        }
    }


    return (<div className='container'>
        <Input
            style={{ marginTop: '60px' }}
            inputPlaceh={'Fruit name...'}
            type={'text'}
            inputEvent={(e) => setFrName(e.target.value)}
            value={frName}
        />
        <Input
            inputPlaceh={'Fruit type...'}
            type={'text'}
            inputEvent={(e) => setFrType(e.target.value)}
            value={frType}
        />
        <Input
            inputPlaceh={'Fruit count...'}
            type={'text'}
            inputEvent={(e) => setFrCount(e.target.value)}
            value={frCount}
        />
        <Input
            inputPlaceh={'Fruit price...'}
            type={'text'}
            inputEvent={(e) => setFrPrice(e.target.value)}
            value={frPrice}
        />
        {errorFlag && false || <ErrorMessage message={errorMessage} />}
        <Button
            value={'create'}
            style={{ marginTop: '30px' }}
            buttonEvent={handlerCreateFruit}

        />
    </div>);
}