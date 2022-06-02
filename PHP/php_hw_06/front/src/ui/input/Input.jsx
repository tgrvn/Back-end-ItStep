import './style.scss';

export function Input({ type, value, inputName, inputEvent, inputPlaceh, style }) {
    return (<>
        <input type={type} style={style} placeholder={inputPlaceh} name={inputName} onChange={inputEvent} value={value} />
    </>);
}