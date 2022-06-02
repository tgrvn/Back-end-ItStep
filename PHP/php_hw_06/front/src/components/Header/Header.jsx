import { NavLink } from 'react-router-dom'
import './style.scss'

export function Header() {
    return (<header>
        <div className="container">
            <nav>
                <NavLink className={({ isActive }) => (isActive ? 'nav-link active': 'nav-link')} to='/'>
                    all fruits
                </NavLink>
                <NavLink className={({ isActive }) => (isActive ? 'nav-link active': 'nav-link')} to='/random'>
                    random fruits
                </NavLink>
                <NavLink className={({ isActive }) => (isActive ? 'nav-link active': 'nav-link')} to='/createFruit'>
                    create fruit
                </NavLink>
            </nav>
            <nav>
                {/* <NavLink className='nav-link' to='/createUser'>
                    create user
                </NavLink> */}
                <NavLink to='/login' className='link'>
                login
            </NavLink>
        </nav>
    </div>
    </header >);
}