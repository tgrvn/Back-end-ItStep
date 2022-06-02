import { Route, Routes } from 'react-router-dom';
import './App.css';
import { Header } from './components/Header/Header';
import { AllFruitsCont } from './containers/AllFruitsCont/AllFruitsCont';
import { CreateFruitCont } from './containers/CreateFruitCont/CreateFruitCont';
import { CreateUserCont } from './containers/CreateUserCont/CreateUserCont';
import { RandomFruitCont } from './containers/RandomFruitCont/RandomFruitCont';
import { LoginCont } from './containers/LoginCont/LoginCont';

function App() {
  return (
    <div className='App'>
      <div className='wrapper'>
        <Header />

        <Routes>
          <Route path='/' element={<AllFruitsCont />}></Route>
          <Route path='/random' element={<RandomFruitCont />}></Route>
          <Route path='/createFruit' element={<CreateFruitCont />}></Route>
          <Route path='/createUser' element={<CreateUserCont />}></Route>
          <Route path='/login' element={<LoginCont />}></Route>
        </Routes>
      </div>
    </div>
  );
}

export default App;
