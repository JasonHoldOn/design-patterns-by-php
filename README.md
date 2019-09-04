# 目录

- [第一章 代码无错就是优 －－－ 简单工厂模式](/src/Operation.php)
> 学会通过分封装，继承，多态把程序的藕合度降低
>
> 复用，不是复制！  
>
> 高内聚，低耦合

- [第二章 商场促销 －－－ 策略模式]()
> 面向对象的编程，并不是类越多越好，类的划分为了封装，但分类的基础是抽象，具有相同属性和功能的对象集合才是类。  
>
> 策略模式是一种定义一系列算法的方法，从概念上来看，所有这些算法完成的都是相同的工作，只是实现不同，它可以以相同的方式调用所有的算法，减少了各种算法类与使用算法类之间的耦合。
>
> 策略模式的Strategy类层次为Context定义了一系列的可供重用的算法或行为。继承有助于析取出这些算法中公共功能。
>
> 策略模式简化了单元测试，因为每个算法都有自己的类，可以通自己接口单独测试。
>
> 当不同的行为堆砌在一个类中时，就很难避免使用条件语句来选择合适的行为。将这些行为封装在一个个Strategy类中，可以在使用这些行为的类中消除条件语句。
>
> 策略模式就是用来封装算法的，但在实践中，我们发现可以用它来封装几乎任何类型的规则，只要在分析过程中听到需要在不同时间应用不同的业务规则，就可以考虑使用策略模式处理这种变化的可能性。
>
> 在基本的策略模式中，选择所用具体实现的职责由客户端对象承担，并转给策略模式的Context对象。

- 第三章 拍摄UFO －－－ 单一职责原则
> 单一职责原则， 就一个类而言,应该仅有一个引起 它变化的原因。
>
> 如果一个类承担的职责过多，就等于把职责耦合在一起，一个职责的变化可能会削弱或者抑制这个类完成其他职责的能力。这种耦合会导致脆弱的设计，当变化发生时，设计会遭受到意想不到的破环。
>
> 软件设计真正要做的许多内容，就是发现职责并把这些职责相互分离。
>
> 如果你能够想到多于一个的动机改变一个类，那么这个类就具有多于一个类的职责。

- 第四章 研求职两不误 －－－ 开放－封闭原则
> 开放-封闭原则，是说软件实体（类、模块、函数等）应该可以扩展，但是不可以修改。[ASD]
>
> 怎样的设计能面对需求的改变却可以保持相对稳定，从而使得系统在第一个版本以后不断推出新的版本呢？
>
> 无论模块是多么的'封闭'，都会存在一些无法对之封闭的变化。既然不能完全封闭，设计人员必须对于他设计的模块应该对哪种变化封闭做出选择。他必须先猜出最有可能变化的种类，让后构造抽象来隔离那些变化。
>
> 在我们最初编写代码时，假设变化不会发生，当变化发生时，我们就创建抽象来隔离以后发生的同类变化。
>
> 面对需求，对程序的改动是通过增加新代码进行的，而不是改现有的代码。
>
> 我们希望的是在开发工作展开不久就知道可能发生的变化。查明可能发生变化所等待的时间越长，要创建正确的抽象就越难。
>
> 开放－封闭原则是面向对象设计的核心所在。遵循这个原则可以带来面向对象技术所声称的巨大好处，也就是可维护，可复用，灵活性好。开发人员应该仅对程序中呈现出频繁变化的那些部分做出抽象，然而，对于应用程序中的每个部分都刻意地进行抽象同样不是一件好事。拒绝不成熟的抽象和抽象本身一样重要。

- 第五章 会修电脑不会修收音机？ －－－ 依赖倒转原则
> 依赖倒转原则, 高层模块不应该依赖底层模块，抽象不应该依赖细节，都应该依赖抽象。针对接口编程，不要对实现编程。
>
> 里氏替换原则，子类型必须能够替换它们的父类型。
>
> 只有当子类可以替换父类，软件单位的功能不受影响时，父类才真正被复用，而子类也能够在父类的基础上增加新的行为。
>
> 由于子类型的可替换性才使得使用父类类型的模块在无需修改的情况下就可以扩展。
>
> 依赖倒转其实可以说是面向对象设计的标志，用哪种语言来编写程序不重要，如果编写时考虑的都是如何针对抽象编程而不是针对细节编程，即程序中所有的依赖关系都是终止于抽象类或者接口，那就是面向对象的设计，反之那就是过程化的设计了。

- [第六章 穿什么有这么重要吗 －－－ 装饰模式](/src/Decorator.php)
> 装饰模式，动态地给一个对象添加一些额外的职责，就增加功能来说，装饰模式比生成子类更为灵活。
>
> 装饰模式是为已有功能动态的添加更多功能的一种方式。
>
> 当系统需要新功能的时候，是向旧的类中添加新的代码。这些新的代码通常装饰了原有类的核心职责或主要行为。
>
> 在主类中加入新的字段，新的方法和新的逻辑，从而增加了主类的复杂度，而这些新加入的东西仅仅是为满足一些只在某种特定情况下才会执行的特殊行为的需要。装饰模式却提供了一个非常好的解决方案，它把每个要装饰的功能放在单独的类中，并让这个类包装它要装饰的对象，对此，当需要执行特殊行为时，客户代码就可以在运行时根据需要选择地，按顺序地使用装饰功能包装对象了。
> 
> 装饰模式的优点就是把类中的装饰功能从类中搬移去除，这样可以简化原有的类。
>
> 有效地把类的核心职责和装饰功能区分开了，而且可以去除相关类中的重复的装饰逻辑。

- [第七章 为别人做嫁衣 －－－ 代理模式](/src/Proxy.php)
> 代理模式，为其他对象提供一种代理以控制对这个对象的访问

- [第八章 雷锋依然在人间 －－－ 工厂方法模式](/src/FactoryMethod.php)
> 工厂方法模式，定义一个创建对象的接口，让子类确定实例化哪一个类。工厂方法使一个类的实例化延迟到7其子类。
>
> 简单工厂模式的最大优点在于工厂类中包含了必要的逻辑判断，根据用户端的选择条件动态实例化相关的类，对于客户端来说，去除了与具体产品的依赖。
> 
> 工厂方法模式实现时，客户端需要决定实例化哪一个工厂来实现运算类，选择判断的问题还是存在的，也就是说，工厂方法把简单工厂的内部逻辑判断移到了客户端代码来进行。你 想要加功能，本来是改工厂类的，而现在是修改客户端。

- [第九章 简历复印 －－－ 原型模式](/src/Prototype.php)
> 原型模式，用原型实例指定创建对象的种类，并且通过拷贝这些原型创建新的对象。
> 
> 原型模式其实就是从一个对象再创建另外一个可定制的对象，而且不需要知道任何创建的细节。
> 
> 一般在初始化的信息不发生变化的情况下，克隆是最好的办法。既隐藏了对象创建的细节，又对性能是大大的提高。
>
> 深拷贝与浅拷贝要弄清楚(值类型、引用类型)：通俗一点，用一个改变会不会影响另一个来区分。

- [第十章 考题抄错会做也白搭 －－－ 模版方法模式](/src/Template.php)
> 模版方法模式，定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模版方法使得子类可以不改变算法的节结构即可重定义该算法的某些特定步骤。
>
> 既然用了继承，并且肯定这个继承有意义，就应该要成为子类的模版，所有重复的代码都应该要上升到父类去，而不是让每个子类去重复。
>
> 当我们要完成在某一细节层次一致的一个过程或一系列步骤，但其中个别步骤在更详细的层次上的实现可能不同时，我们通常考虑用模版方法模式来处理。
>
> 模版方法模式是通过把不变行为搬移到超类，去除子类中的重复代码来体现它的优势。提供了一个很好的代码复用平台。
>
> 当不变的和可变的行为在方法的子类实现中混合在一起的时候，不变的行为就会在子类中重复出现。通过模版方法把这些行为搬移到单一的地方，这样就帮助子类摆脱重复的不变行为的纠缠。

- [第十一章 无熟人难办事 －－－ 迪米特法则]()
> 迪米特法则，如果两个类不彼此直接通信，那么这两个类就不应当发生直接的相互作用。如果其中一个类需要调用另一个类的某一个方法的话，可以通过第三者转发这个调用。
> 
> 在类的结构设计上，每一个类都应当 尽量降低成员的访问权限
> 
> 类之间的耦合越弱，越有利于复用，一个处在弱耦合的类被修改，不会对有关系的类造成波及。

- [第十二章 牛市股票还会亏钱 －－－ 外观模式](/src/Facade.php)
> 外观模式，为子系统中的一组接口提供一个一致的界面，此模式定义了一个高层接口，这个接口使得这一子系统更容易使用。
>
> 首先，在设计初期阶段，应该要有意识的将不同的两个层分离，层与层之间建立外观Facade；其次，在开发阶段，子系统往往因为不断的重构演化而变得越来越复杂，增加外观Facade可以提供一个简单的接口，减少它们之间的依赖；另外在维护一个遗留的大型系统时，可能这个系统已经非常难以维护和扩展了，为新系统开发一个外观Facade类，来提供设计粗糙或高度复杂的遗留代码的比较清晰简单的接口，让系统与Facade对象交互，Facade与遗留代码交互所有复杂的工作

- [第十三章 好菜每回味不同 －－－ 建造者模式](/src/Builder.php)
> 建造者模式，将一个复杂对象的构建与它的表示分离，使得同样的构建过程可以创建不同的表示。
>
> 如果我们用了建造者模式，那么用户只需要指定需要建造的类型就可以得到他们，而具体建造的过程和细节就不需要知道了。
>
> 主要用于创建一些复杂的对象，这些对象内部构建间的建造顺序通常是稳定的，但对象内部的构建通畅面临着复杂的变化。
>
> 建造者模式是在当创建复杂对象的算法应该独立于改对象的组成部分以及它们的装配方式时适用的模式。

- [第十四章 老板回来，我不知道 －－－ 观察者模式](/src/Observer.php)
> 观察者模式，定义了一种一对多的依赖关系，让多个观察者对象同时监听某一个主题对象。这个主题对象在状态发生变化时，会通知所有观察者对象，使它们能够自动更新自己。
>
> 将一个系统分割成一系列相互协作的类有一个很不好的副作用，那就是要维护相关对象间的一致性。我们不希望为了维持一致性而使各类紧密耦合，这样会给维护、扩展和重用都带来不便。
>
> 观察者模式所做的工作其实就是在解除耦合。让耦合的双方都依赖于抽象，而不是依赖于具体。从而使得各自的变化都不会影响另一边的变化。

- [第十五章 就不能不换DB吗？ －－－ 抽象工厂模式](/src/AbstractFactory.php)
> 抽象工厂模式，提供一个创建一系列相关或相互依赖对象的接口，而无需指定他们的具体类。
>
> 菜鸟程序员遇到问题，只会用时间来摆平。
>
> 工厂方法模式是定义一个用于创建对象的接口，让子类决定实例化哪一个类。
>
> 抽象工厂模式的好处便是易于交换产品系列，由于具体工厂类，在一个应用中只需要在初始化的时候出现一次，这就使得改变一个应用的具体工厂变得非常容易，它只是需要改变具体工厂即可使用不同的产品配置。它让具体的创建实例过程与客户端分离，客户端是通过它们的抽象接口操作实例，产品的具体类名也被具体工厂的实现分离，不会出现在客户端代码中。
>
> 编程是门艺术，大批量的改动是非常丑陋的做法。
>
> 所有在用简单工厂的地方，都可以考虑用反射技术来去除switch或if，解除分支判断代码的耦合。

- [第十六章 无尽加班何时休 －－－ 状态模式](/src/State.php)
> 状态模式，当一个对象的内在状态改变时允许改变其行为，这个对象看起来像是改变了其类。
>
> 面向对象设计其实就是希望做到代码的责任分解。
>
> 状态模式主要解决的当控制一个对象状态转换的条件表达式过于复杂时的情况。把状态的判断逻辑转移到表示不同状态的一系列类当中，可以把复杂的判断逻辑简单化。
>
> 将于特定状态相关的行为局部化，并且将不同状态的行为分割开来。
>
> 将特定的状态相关的行为都放入一个对象中，由于所有与状态相关的代码都存在于某个ConcreteState中，所以通过定义的子类可以很容易地增加新的状态和转换。
>
> 消除了庞大的条件分支语句。
>
> 状态模式通过把各种状态转移逻辑分布到State的子类之间，来减少项目之间的依赖。
>
> 当一个对象的行为取决于它的状态，并且它必须在运行时刻根据状态改变它的行为时，就可以考虑使用状态模式了。

- [第十七章 在NBA我需要翻译 －－－ 适配器模式](/src/Adapter.php)
> 适配器模式，将一个类的接口转化成客户希望的另外一个接口。适配器模式使得原本由于接口不兼容而不能一起工作的那些类可以一起工作。
>
> 系统的数据和行为都正确，但接口不符时，我们应该考虑用适配器，目的是使控制范围之外的一个原有对象与某个接口匹配。适配器模式主要应用于希望复用一些现存的类。但是接口又与复用环境要求不一致的情况。
>
> 两个类所做的事情相同或相似，但是具有不同的接口时要使用它。
>
> 在双方都不太容易修改的时候再使用适配器模式适配。

- [第十八章 如果再回到从前 －－－ 备忘录模式](/src/Memento.php)
> 备忘录模式，在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之前保存这个状态。这样以后就可将该对象恢复到原先保存的状态。
> 
> 代码无措未必优
>
> 如果在某个系统中使用命令模式时，需要实现命令的撤销功能，那么命令模式可以使用备忘录模式来存储可撤销操作的状态。
> 
> 使用备忘录可以把复杂的对象内部信息对其他的对象屏蔽起来。
>

- [第十九章 分公司 ＝ 一部分 －－－ 组合模式](/src/Composite.php)
> 组合模式，将对象组合成树形结构以表示‘部分与整体’的层次结构。组合模式使得用户对单个对象和组合对象的使用具有一致性。
>
> 透明方式，子类的所有接口一致，虽然有些接口没有用。
>
> 安全方式，子类接口不一致，只实现特定的接口，但是这样就要做相应的判断，带来了不便。
>
> 需求中是体现部分与整体层次的结构时，或希望用户可以忽略组合对象与单个对象的不同，统一地使用组合结构中的所有对象时，就应该考虑用组合模式了。
>
> 组合模式可以让客户一致地使用组合结构和单个对象。

- [第二十章 想走？可以！先买票 －－－ 迭代器模式](/src/Iterator.php)
> 当你需要对聚集有多种方式遍历时，可以考虑用迭代器模式。
>
> 当你需要访问一个聚集对象，而且不管这些对象是什么都需要遍历的时候，你就应该考虑用迭代器模式。
>
> 为遍历不同的聚集结构提供如开始、下一个、是否结束、当前哪一项等统一的接口。
>
> 迭代器模式就是分离了集合对象的遍历行为，抽象出一个迭代器类来负责，这样既可以做到不暴露集合内部的结构，又可让外部代码透明地访问集合内部的数据。

- [第二十一章 有些类也需要计划生育 －－－ 单例模式](/src/Singleton.php)
> 单例模式，保证一个类仅有一个实例，并提供一个访问它的全局访问点。
>
> 单例模式因为Singleton类封装它的唯一实例，这样它可以严格地控制客户怎样访问以及何时访问它。简单地说就是对唯一实例的受控访问。

- [第二十二章 手机软件何时统 －－－ 桥接模式](/src/Bridge.php)
> 桥接模式，将抽象部分与它的实现部分分离，使它们都可以独立地变化。
>
> 合成/聚合复用原则，尽量使用合成/聚合，尽量不要使用类继承。
>
> 聚合表示弱的‘拥有’关系，体现的是A对象可以包含B对象，但B对象不是A对象的一部分；合成则是一种强的‘拥有’关系，体现了严格的部分和整体的关系，部分和整体的生命周期一样。
> 
> 对象的继承关系是在编译时就定义好了，所以无法在运行时改变从父类继承的实现。子类的实现与它的父类有非常紧密的依赖关系，以至于父类实现中的任何变化必然会导致子类发生变化。当你需要复用子类时，如果继承下来的实现不适合解决新的问题，则父类必须重写或被其他更合适的类替换。这种依赖关系限制了灵活性并最终限制了复用性。
>
> 优先使用对象的合成/聚合将有助于你保持每个类被封装，并被集中在单个任务上。这样类和类继承层次会保持较小规模，并且不太可能增长为不可控制的庞然大物。
> 
> 什么叫抽象与它的实现分离，这并不是说，让抽象类与其派生类分离，因为这没有任何意义。实现指的是抽象类和它的派生类用来实现自己的对象。
> 
> 实现系统可能有多角度分类，每一种分类都有可能变化，那么就把这种多角度分离出来让它们独立变化，减少它们之间的耦合。
>
> 只要真正深入地理解了设计原则，很多设计模式其实就是原则的应用而已，或许在不知不觉中就在使用设计模式了。