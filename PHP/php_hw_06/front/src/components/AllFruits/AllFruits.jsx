import { FruitCard } from '../FruitCard/FruitCard';
import './style.scss';

export function AllFruits({ data }) {

    return (<div className='fruits-container'>
        {data && data.map((fruit) => <FruitCard key={Math.random().toString(16).slice(2)} fruit={fruit} />)}
    </div>);
}