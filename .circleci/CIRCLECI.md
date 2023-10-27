Set-up CI/CD pipeline using CircleCI 

Setting up a professional CI/CD pipeline using CircleCI involves the following steps: 

Sign Up on CircleCI Website: 

To get started, sign up for a CircleCI account using your GitHub credentials on the CircleCI website. 

Generate SSH Keys: 

Follow the instructions provided on CircleCI to generate a pair of public and private SSH keys. For Windows Command Prompt, you can use the following command: 

ssh-keygen -t ed25519 -f .ssh/project_key -C gmail@dom.com 
 
This will create the necessary key pair. 

Copy the Public Key: 

If you are using Windows Command Prompt, copy the public key to your clipboard with the following command: 

type .ssh\project_key.pub | clip 
 

Add Deploy Keys to Your Repository: 

You can directly access the deployment key settings for your repository by visiting the following URL 

https://github.com/<gitusername>/<repository>/settings/keys/new 

Alternatively, you can follow the steps provided by CircleCI to navigate to your repository settings and add the generated public key. 

Create a New Project: 

In CircleCI, create a new project associated with your GitHub repository. 

Add YAML Configuration and Commit: 

Define your CI/CD pipeline by creating a YAML configuration file. Commit this file to your repository. 

Trigger the Pipeline: 

To initiate your CI/CD pipeline, you can manually run it by clicking on the "Run Pipeline" option within CircleCI. You can also trigger it automatically based on your defined criteria, such as code changes or pull requests. 

Review and Compare YAML Code: 

If you need to make changes or updates to your pipeline configuration, you can pull the YAML code back into your repository. To do this, navigate to your repository, go to the "Compare" section, and review the YAML code changes before committing them. 

 
