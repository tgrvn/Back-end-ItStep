import './style.scss';

export function FruitCard({ fruit }) {
    return (<div className='card'>
        <h2>{fruit.name}</h2>
        <h4>{fruit.type}</h4>
        <p>{fruit.count}</p>
        <p>{fruit.price} $</p>
    </div>);
}