import { useEffect, useState } from 'react';
import { AllFruits } from '../../components/AllFruits/AllFruits';
import { getData } from '../../services/api';

export function AllFruitsCont() {
    const ALL_FRUIT_URL = 'http://localhost/less_6/api/getAllFruits.php';
    const [allFruits, setAllFruits] = useState(null);

    function getAllFruits() {
        getData(ALL_FRUIT_URL).then((data) => {
            setAllFruits(data);
        })
    }

    useEffect(() => {
        getAllFruits();
    }, [])

    return (<div className='container'>
        <AllFruits data={allFruits} />
    </div>);
}