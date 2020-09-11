<?php
namespace console\controllers;

use console\rbac\rules\AuthorRule;
use yii\helpers\Console;
use yii\console\Controller;
use yii\rbac\ManagerInterface;
use Yii;

/**
 * Creates base RBAC authorization data for our application.
 * -----------------------------------------------------------------------------
 * Creates 5 roles:
 *
 * - theCreator : you, developer of this site (super admin)
 * - admin      : your direct clients, administrators of this site
 * - collaborator   : collaborator of this site / company, this may be someone who should not have admin rights
 * - secretary    : secretary member of this site (authenticated users with extra powers)
 *
 * Creates 2 permissions:
 *
 * - usePremiumContent  : allows secretary users to use secretary content
 * - manageUsers        : allows admin+ roles to manage users (CRUD plus role assignment)
 *
 * Creates 1 rule:
 *
 * - AuthorRule : allows collaborator+ roles to update their own content (not used by default)
 */
class RbacController extends Controller
{
    /**
     * Initializes the RBAC authorization data.
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        //---------- RULES ----------//
        // add the rule (not used by default)
        $rule = new AuthorRule;
        $auth->add($rule);
        //---------- PERMISSIONS ----------//
        //
        // add "...index" permission
        $indexRequired = $auth->createPermission('indexRequired');
        $indexRequired->description = 'Index a Requireds';
        $auth->add($indexRequired);
        // add "...create" permission
        $viewRequired = $auth->createPermission('viewRequired');
        $viewRequired->description = 'View a Requireds';
        $auth->add($viewRequired);
        // add "...print" permission
        $printRequired = $auth->createPermission('printRequired');
        $printRequired->description = 'Print a Requireds';
        $auth->add($printRequired);
        // add "...create" permission
        $createRequired = $auth->createPermission('createRequired');
        $createRequired->description = 'Create a Requireds';
        $auth->add($createRequired);
        // add "...update" permission
        $updateRequired = $auth->createPermission('updateRequired');
        $updateRequired->description = 'Update Required';
        $auth->add($updateRequired);
        // add "...delete" permission
        $deleteRequired = $auth->createPermission('deleteRequired');
        $deleteRequired->description = 'Delete Required';
        $auth->add($deleteRequired);
        // add the "...updateOwn" permission and associate the rule with it.
        $updateOwnRequired = $auth->createPermission('updateOwnRequired');
        $updateOwnRequired->description = 'Update own required';
        $updateOwnRequired->ruleName = $rule->name;
        $auth->add($updateOwnRequired);
        //
        //---------- ROLES ----------//
        // add "author" role and give this role the "createPost" permission
        // add "agreements" role
        $agreements = $auth->createRole('agreements');
        $agreements->description = 'agreements users. Authenticated users with extra powers';
        $auth->add($agreements);
        //
        $auth->addChild($agreements, $indexRequired);
        $auth->addChild($agreements, $viewRequired);
        $auth->addChild($agreements, $printRequired);
        // add "author" role and give this role the "createPost" permission
        // add "owners" role
        $owners = $auth->createRole('owners');
        $owners->description = 'owners users. Authenticated users with extra powers';
        $auth->add($owners);
        //
        $auth->addChild($owners, $indexRequired);
        $auth->addChild($owners, $viewRequired);
        $auth->addChild($owners, $printRequired);
        // add "author" role and give this role the "createPost" permission
        // add "secretary" role
        $secretary = $auth->createRole('secretary');
        $secretary->description = 'secretary users. Authenticated users with extra powers';
        $auth->add($secretary);
        //
        $auth->addChild($secretary, $indexRequired);
        $auth->addChild($secretary, $viewRequired);
        $auth->addChild($secretary, $printRequired);
        $auth->addChild($secretary, $createRequired);
        $auth->addChild($secretary, $updateRequired);
        //$auth->addChild($secretary, $deleteRequired);
        $auth->addChild($secretary, $updateOwnRequired);
        // add "collaborator" role and give this role:
        // createArticle, updateOwnArticle and adminArticle permissions, plus secretary role.
        $collaborator = $auth->createRole('collaborator');
        $collaborator->description = 'collaborator of this site/company who has lower rights than admin';
        $auth->add($collaborator);
        $auth->addChild($collaborator, $createRequired);
        $auth->addChild($collaborator, $updateRequired);
        $auth->addChild($collaborator, $updateOwnRequired);
        //
        // add "admin" role and give this role:
        // manageUsers, updateArticle adn deleteArticle permissions, plus collaborator role.
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator of this application';
        $auth->add($admin);
        $auth->addChild($admin, $collaborator);
        $auth->addChild($admin, $secretary);
        //
        $auth->addChild($admin, $indexRequired);
        $auth->addChild($admin, $viewRequired);
        $auth->addChild($admin, $printRequired);
        $auth->addChild($admin, $createRequired);
        $auth->addChild($admin, $updateRequired);
        $auth->addChild($admin, $deleteRequired);
        $auth->addChild($admin, $updateOwnRequired);
        // add "theCreator" role ( this is you :) )
        // You can do everything that admin can do plus more (if You decide so)
        $theCreator = $auth->createRole('theCreator');
        $theCreator->description = 'You!';
        $auth->add($theCreator);
        $auth->addChild($theCreator, $admin);
        $auth->addChild($theCreator, $collaborator);
        $auth->addChild($theCreator, $secretary);
        //
        $auth->addChild($theCreator, $indexRequired);
        $auth->addChild($theCreator, $viewRequired);
        $auth->addChild($theCreator, $printRequired);
        $auth->addChild($theCreator, $createRequired);
        $auth->addChild($theCreator, $updateRequired);
        $auth->addChild($theCreator, $deleteRequired);
        $auth->addChild($theCreator, $updateOwnRequired);
        //
        if ($auth) {
            $this->stdout("\nRbac authorization data are installed successfully.\n", Console::FG_GREEN);
        }
    }
}
